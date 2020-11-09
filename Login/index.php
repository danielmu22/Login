<?php

    session_start();

    if(isset($_SESSION['usuario'])){
        header("location: bienvenida.php");
    };

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Register Daniel</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/mycss.css" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>

</head>

<body>
    <main>
        <div class="contenedor__todo">

            <div class="caja__trasera">

                <!--Caja de login-->
                <div class="caja__trasera-login">
                    <h3>¿Ya tienes una cuenta?</h3>
                    <p>Inicia sesi&oacute;n</p>
                    <button id="btn__iniciar-sesion">Iniciar sesi&oacute;n</button>
                </div>

                <!--Caja de registro-->
                <div class="caja__trasera-register">
                    <h3>¿A&uacute;n tienes una cuenta?</h3>
                    <p>Registrate para que puedas acceder</p>
                    <button id="btn__registrarse">Registrate</button>
                </div>
            </div>
            <div class="contenedor__login-register">

                <!--Formulario de login-->
                <form action="php/login_usuario_be.php" method="POST" class="formulario__login">
                    <h2>Iniciar sesión</h2>
                    <input type="text" placeholder="Correo electronico" name="correo"/>
                    <input type="password" placeholder="Contraseña" name="contrasena"/>
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link" href="recuperacontra.php">Recupera contraseña</a>
                        </li>
                    </ul>
                    <button>Entrar</button>
                </form>

                <!--Formulario de registro-->
                <form action="php/registro_usuario_be.php" method="POST" class="formulario__register">
                    <h2>Registrarse</h2>
                    <input type="text" placeholder="Nombre completo" name="nombre_completo"/>
                    <input type="text" placeholder="Correo electronico" name="correo"/>
                    <input type="text" placeholder="Usuario" name="usuario"/>
                    <input type="password" placeholder="Contraseña" name="contrasena"/>
                    <button>Registrarse</button>
                </form>


            </div>

        </div>

    </main>
    <script src="assets/js/script.js"></script>
</body>

</html>

