<?php

    require_once('vendor/autoload.php');
    require_once('google_auth.php');
    require_once('init.php');

    $googleClient = new Google_Client();
    $auth = new GoogleAuth($googleClient);

    if($auth->checkRedirectCode()){
        //die($_GET['code']);
        header('Location:index.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if(!$auth->isLoggedIn()): ?>
        <a href="<?php echo $auth->getAuthUrl();?>">Inicia sesión con google</a>
    <?php else: ?>
        <a href="logout.php">Cerrar sesión</a>
    <?php endif; ?>
</body>
</html>