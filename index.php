<?php
    try {
        $base = new PDO('mysql:host=localhost; dbname=personal', 'root','');
        $base->exec('SET CHARACTER SET utf8');

        $sql = "SELECT nombre, apellido, edad from datos where id=?";
        $resultado = $base->prepare($sql);

        $resultado->execute(array(2));

        while($reg=$resultado->fetch(PDO::FETCH_ASSOC)) {
            echo "Nombre: " . $reg['nombre'].'<br>';
            echo "Apellido: " . $reg['apellido'].'<br>';
            echo "Edad: " . $reg['edad'].'<br>';

        }

        $resultado->closeCursor();
    }catch(Exception $err) {
        die('Error: ' . $err->getMessage());
    }

?>