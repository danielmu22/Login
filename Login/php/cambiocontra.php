<?php

include 'php/conexion_be.php';


$dom = $_SERVER['HTTP_HOST']; //recuperamos el dominio
$rest = $_SERVER['REQUEST_URI']; //recuperamos el resto
$url_completa = "http://" . $dom . $rest; //armamos la url

$code = basename($url_completa);

    $sql = "SELECT * FROM cambiocontrasena WHERE codigo='$code'";

    $ejecutar = mysqli_query($conexion, $sql);

    if(mysqli_num_rows($ejecutar) > 0){

        $sql2 = "UPDATE usuarios SET contrasena = '$contrasena' WHERE correo = (SELECT correo FROM cambiocontrasena WHERE codigo='$code')";
        $ejecutar2 = mysqli_query($conexion, $sql2);
        $sql3 = "DELETE FROM cambiocontrasena WHERE codigo='$code' ";
        $ejecutar3 = mysqli_query($conexion, $sql3);
        
        echo'
        <script>
            alert("Contraseña cambiada");
        </script>
        ';
        header("location: ./../index.php");

        mysqli_close($conexion);
        exit();
    }



?>
