<?php

include 'php/conexion_be.php';


$dom = $_SERVER['HTTP_HOST']; //recuperamos el dominio
$rest = $_SERVER['REQUEST_URI']; //recuperamos el resto
$url_completa = "http://" . $dom . $rest; //armamos la url

echo $rest;

$code = basename($url_completa);
echo "</br>";
echo $code;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Register Daniel</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/mycss.css" />
</head>

<body>


    <form action="./../prueba.php"
    method="POST" class="">
        <h2>Dime la nueva contra</h2>
        <input type="text" placeholder="Nueva contraseña" name="contrasena"/>
        <input type="hidden" placeholder="Nueva contraseña" name="code" value="<?php echo"$code"; ?>"/>
        <button>Cambiar</button>
    </form>
    


</body>   
</html>
