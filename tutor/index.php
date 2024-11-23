<?php
    require '../includes/funciones.php';

    $auth = estaAutenticado();

    if (!$auth) {
        header('Location: /');
    }

    incluirTemplate('header');
?>


<body>
    <header>
        <div class="left">ST-UACH</div>
        <div class="right">TUTOR</div>
    </header>

    <div class="container">
        <ul class="options">
            <li><a href="#">Solicitar tutoría</a></li>
            <li><a href="cambio_tutor.php">Solicitar cambio de tutor</a></li> 
            <li><a href="#">Agenda</a></li>
            <li><a href="#">Evaluar sesión de tutoría</a></li>
        </ul>
    </div>
</body>
</html>
