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
        <div class="right">Nombre</div>
    </header>

    <div class="container">
        <ul class="options">
            <li><a href="./alumno/propiedades/solicitud_tutoria.php">Solicitar tutoría</a></li>
            <li><a href="./alumno/propiedades/cambio_tutor.php">Solicitar cambio de tutor</a></li> 
            <li><a href="./alumno/propiedades/agenda_alumno.php">Agenda</a></li>
            <li><a href="#">Evaluar sesión de tutoría</a></li>
        </ul>
    </div>
</body>
</html>
