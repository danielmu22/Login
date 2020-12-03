<?php
/*
*/  
    include 'conexion_be.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    $correo = $_POST['correo'];

    $validar_login = mysqli_query($conexion, "SELECT * FROM usuario WHERE correo='$correo'");


    if(mysqli_num_rows($validar_login) > 0){

        $codigo = substr(str_replace(['+', '/', '='], '', base64_encode(random_bytes(32))), 0, 32);
        echo ($codigo);
        
        $sql = "INSERT INTO cambiocontrasena(correo, codigo) VALUES('$correo','$codigo')";

        $ejecutar = mysqli_query($conexion, $sql);





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
                $mail->Subject = 'Cambio de contraseña';
                $mail->Body    = 'Para camiar la contraseña accede a este enlace http://127.0.0.1/Login/cambiarcontrasena.php/' . $codigo;
    
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
    






        header("location: ../index.php");
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