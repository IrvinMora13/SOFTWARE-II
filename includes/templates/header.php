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
    <link rel="stylesheet" href="../../build/css/app.css">
</head>

<body>
    <header>
        <?php if($auth): ?>
            <a href="/cerrar_sesion.php" class= "cerrar_sesion">Cerrar Sesión</a>
        <?php endif ?>
        <div class="left">
        <t1>ST-UACH</t1>
            <div class="menu-icon" onclick="toggleMenu()">☰</div>
            <div class="dropdown-menu" id="menu">
                <a href="./tutor/propiedades/revision_evaluaciones.php">Revisión de evaluaciones</a>
                <a href="./tutor/propiedades/agenda_tutor.php">Agenda</a>
                <a href="#">Evaluar sesión de tutoría</a>
            </div>
        </div>
        <div class="right">
            <span><?php echo isset($_SESSION['nombre']) ? htmlspecialchars($_SESSION['nombre']) : 'Usuario Anónimo'; ?></span>
            <img src="src/Escudo_UACH.png" alt="Menú">
        </div>
    </header>

</body>