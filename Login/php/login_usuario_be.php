<?php

session_start();

    include 'conexion_be.php';

    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $contrasena = hash('sha512', $contrasena);

    $validar_login = mysqli_query($conexion, "SELECT * FROM usuario WHERE correo='$correo' AND contrasena='$contrasena'");


    if(mysqli_num_rows($validar_login) > 0){
        $_SESSION['usuario'] = $correo;
        header("location: ../bienvenida.php");
        mysqli_close($conexion);
        exit;
    }
    else{
        
        echo '
        <script>
            alert("Usuario no existe, por favor revise los datos");
            window.location = "../index.php";
        </script>
        ';
        mysqli_close($conexion);
    }


?>