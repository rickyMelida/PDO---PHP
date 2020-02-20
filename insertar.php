<?php
    require_once './datosDB.php';
    
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];

    $con = mysqli_connect($db_host, $db_usuario, $db_pass);

    if(mysqli_connect_errno()) {
        echo 'Fallo al conectar la BD';
        exit();
    }

    mysqli_select_db($con, $db_nombre) or die('No se encontro la BD');

    mysqli_set_charset($con, 'utf8');

    $sql = "INSERT into datos (nombre, apellido, edad) values (?, ?, ?)";

    $resultado = mysqli_prepare($con, $sql);

    $ok = mysqli_stmt_bind_param($resultado, "sss", $nombre, $apellido, $edad);

    $ok = mysqli_stmt_execute($resultado);

    if($ok == false) {
        echo 'Error al ejecutar la consulta';
    }else {
        //$ok = mysqli_stmt_bind_result($resultado, $nombreR, $apellidoR, $edadR);

        echo 'Agregado nuevo registro';

        /*while(mysqli_stmt_fetch($resultado)) {
            echo $nombre . ' ' . $apellido . ' ' . $edad . '<br>';
        }*/

        mysqli_stmt_close($resultado);
    }

?>