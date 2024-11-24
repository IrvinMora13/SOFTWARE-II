<?php
    require '../includes/funciones.php';

    $auth = estaAutenticado();

    if (!$auth) {
        header('Location: /');
    }

    incluirTemplate('header');
?>


<body>
    <div class="container">
        <ul class="options">
            <li><a href="cambio_horario_t.php">Cambiar disponibilidad de horario</a></li>
            <li><a href="revision_evaluaciones.php">Revisión de evaluaciones</a></li> 
            <li><a href="agenda_tutor.php">Agenda</a></li>
            <li><a href="#">Evaluar sesión de tutoría</a></li>
        </ul>
    </div>
</body>
</html>