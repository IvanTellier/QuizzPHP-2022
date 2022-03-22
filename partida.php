<?php
include('misfunciones.php');

//$mysqli guarda la conexión a la BBDD
$mysqli = conectaBBDD();


$tema = $_POST['tema'];
?>
<div class="alert alert-success" role="alert">
  El tema que has elegido es <?php echo $tema; ?>
</div>
<?php
$consulta = $mysqli->query("SELECT * FROM `preguntas` WHERE `tema` = '$tema'");
$num_filas = $consulta->num_rows;

$pregunta_elegida = rand(0, $num_filas);

for ($i = 0; $i < $pregunta_elegida; $i++) {
  $r = $consulta->fetch_array();
}

?>
<div class="conainer">
  <div class="row">
    <div class="col-12">
      <button class="btn btn-dark disabled">
        <?php echo $r ['enunciado']?>
      </button>
      <br><br>
      <button class="btn btn-dark col-12">
        <?php echo $r ['r1']?>
      </button>
      <br><br>
      <button class="btn btn-dark col-12">
        <?php echo $r ['r2']?>
      </button>
      <br><br>
      <button class="btn btn-dark col-12">
        <?php echo $r ['r3']?>
      </button>
      <br><br>
      <button class="btn btn-dark col-12">
        <?php echo $r ['r4']?>
      </button>
      <br><br>
    </div>
  </div>
</div>