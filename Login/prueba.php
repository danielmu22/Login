<?php

include 'php/conexion_be.php';

$contrasena = $_POST['contrasena'];
$code = $_POST['code'];


echo "$code </br>";
echo "$contrasena";

if($contrasena!=""){

    $sql = "SELECT * FROM cambiocontrasena WHERE codigo='$code'";

    $ejecutar = mysqli_query($conexion, $sql);

    if(mysqli_num_rows($ejecutar) > 0){

        $contrasena = hash('sha512', $contrasena);
        $sql2 = "UPDATE usuarios SET contrasena = '$contrasena' WHERE correo = (SELECT correo FROM cambiocontrasena WHERE codigo='$code')";
        $ejecutar2 = mysqli_query($conexion, $sql2);
        $sql3 = "DELETE FROM cambiocontrasena WHERE codigo='$code' ";
        $ejecutar3 = mysqli_query($conexion, $sql3);
        
        echo'
        <script>
            alert("Contraseña cambiada");
        </script>
        ';
        header("location: ./index.php");

        mysqli_close($conexion);
        exit();
    }
}

?>