<?php

    include 'conexion_be.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;


//VARIABLES
    $nombre_completo = $_POST['nombre_completo'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

//ENCRIPTAMIENTO DE CONTRASEÑA
    $contrasena = hash('sha512', $contrasena);


//COMPROBAR QUE SEA UN CORREO

if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    echo '
        <script>
            alert("El correo no vale");
            window.location = "../index.php";
        </script>
    ';
    exit();
}

    $query = "INSERT INTO usuarios(nombre_completo, correo, usuario, contrasena) 
    VALUES('$nombre_completo', '$correo', '$usuario', '$contrasena')";

//Verificar que el correo no se repita en la base de datos
    $verificar_correo = mysqli_query($conexion,"SELECT * FROM usuarios WHERE correo='$correo'");

    if(mysqli_num_rows($verificar_correo) > 0){
        echo'
        <script>
            alert("El correo ya esta registrado, intenta con otro diferente.");
            window.location = "../index.php";
        </script>
        ';
        mysqli_close($conexion);
        exit();
    }
   

//Verificar que el usuario no se repita en la base de datos
    $verificar_usuario = mysqli_query($conexion,"SELECT * FROM usuarios WHERE usuario='$usuario'");

    if(mysqli_num_rows($verificar_usuario) > 0){
        echo'
        <script>
            alert("El usuario ya esta registrado, intenta con otro diferente.");
            window.location = "../index.php";
        </script>
        ';
        mysqli_close($conexion);
        exit();
    }
 

//INSERTAR USUARIO

    $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar){
        require '../Phpmailer/Exception.php';
        require '../Phpmailer/PHPMailer.php';
        require '../Phpmailer/SMTP.php';


        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'pruebasraras189@gmail.com';                     // SMTP username
            $mail->Password   = 'Ejrasz7hjacYXhy';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('pruebasraras189@gmail.com', 'Pepito');
            $mail->addAddress($correo);     // Add a recipient


            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Registro en nuestra pagina web';
            $mail->Body    = 'Bienvenido a nuestra página web';

            $mail->send();
            echo 'Mensaje enviado';
        } catch (Exception $e) {
            echo "Eres tonto: {$mail->ErrorInfo}";
        }
        echo'
            <script>
                alert("Usuario almacenado correctamente.");
                window.location = "../index.php";
            </script>
        ';
    }
    else{
        echo'
            <script>
                alert("Intentalo de nuevo, usuario no almacenado.");
                window.location = "../index.php";
            </script>
        ';
    }

    mysqli_close($conexion);
?>