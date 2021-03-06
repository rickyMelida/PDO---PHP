<?php
    $db_host = 'localhost';
    $db_nombre = 'personal';
    $db_usuario = 'root';
    $db_pass = '';
    
    $para = 'Ricardo';

    $con = mysqli_connect($db_host, $db_usuario, $db_pass);

    if(mysqli_connect_errno()) {
        echo 'Fallo al conectar la BD';
        exit();
    }

    mysqli_select_db($con, $db_nombre) or die('No se encontro la BD');

    mysqli_set_charset($con, 'utf8');

    $sql = "SELECT nombre, apellido, edad from datos where nombre = ?";

    $resultado = mysqli_prepare($con, $sql);

    $ok = mysqli_stmt_bind_param($resultado, "s", $para);

    $ok = mysqli_stmt_execute($resultado);

    if($ok == false) {
        echo 'Error al ejecutar la consulta';
    }else {
        $ok = mysqli_stmt_bind_result($resultado, $nombre, $apellido, $edad);

        echo 'Articulos encontrados: <br><br>';

        while(mysqli_stmt_fetch($resultado)) {
            echo $nombre . ' ' . $apellido . ' ' . $edad . '<br>';
        }

        mysqli_stmt_close($resultado);
    }

?>