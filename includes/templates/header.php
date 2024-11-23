<?php
    
    if (!isset($_SESSION)) {
        session_start();
    }

    $auth = $_SESSION["login"] ?? null;

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ST-UACH</title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>

<body>
    <header>
        <?php if($auth): ?>
            <a href="cerrar_sesion.php">Cerrar Sesion</a>
        <?php endif ?>
    </header>

</body>