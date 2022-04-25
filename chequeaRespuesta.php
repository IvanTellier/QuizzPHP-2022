<?php
    include('misfunciones.php');
    //$mysqli guarda la conexión a la BBDD
    $mysqli = conectaBBDD();

    $respuesta = $_POST['respuesta'];
    $numeroPregunta = $_POST['numeroPregunta'];
    ////query mal hecha!!! SUSPENSO GARANTIZADO!!!
    // $consulta = $mysqli->query("SELECT * FROM preguntas WHERE numero = '$numeroPregunta' ");
    // $r = $consulta->fetch_array();

    //query correct:
    $consulta = $mysqli -> prepare("SELECT correcta FROM preguntas WHERE numero = ? ");
    
    $consulta -> bind_param("s", $numeroPregunta);
    $consulta -> execute();
    $consulta -> store_result();
    $consulta -> bind_result($correcta);
    $consulta -> fetch();


    if ($correcta == $respuesta){
        echo 'ACERTASTE!!!';
    }
    else{
        echo 'PAYASO FALLASTE!!!';
    }
?>