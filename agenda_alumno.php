<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de Tutorías</title>
    <link rel="stylesheet" href="src/scss/agenda_al.css">
</head>
<body>
    <header>
        <div class="left">
            ST-UACH
            <div class="menu-icon" onclick="toggleMenu()">☰</div>
            <div class="dropdown-menu" id="menu">
                <a href="solicitud_tutoria.php">Solicitar tutoría</a>
                <a href="cambio_tutor.php">Cambio de tutor</a>
                <a href="#">Evaluar sesión de tutoría</a>
            </div>
        </div>
        <div class="right">
            <span>Apellido Nombre</span>
            <img src="src/Escudo_UACH.png" alt="Menú">
        </div>
    </header>

    <div class="content">
        <h1>Agenda</h1>
        <div class="week">
            <span>Semana 22 - 26 Abril 2024</span>
        </div>
        <div class="calendar">
            <?php
            // Simulación de datos obtenidos de la base de datos
            $reuniones = [
                ['dia' => 'Lunes', 'hora' => '9:00 AM - 10:00 AM', 'tutor' => 'Jane Doe'],
                ['dia' => 'Martes', 'hora' => '9:00 AM - 10:00 AM', 'tutor' => 'Jane Doe'],
                ['dia' => 'Miércoles', 'hora' => '9:00 AM - 10:00 AM', 'tutor' => 'Jane Doe'],
                ['dia' => 'Jueves', 'hora' => '9:00 AM - 10:00 AM', 'tutor' => 'Jane Doe'],
                ['dia' => 'Viernes', 'hora' => '9:00 AM - 10:00 AM', 'tutor' => 'Jane Doe'],
            ];

            foreach ($reuniones as $reunion) {
                echo "
                <div class='card'>
                    <h2>{$reunion['dia']}</h2>
                    <p>{$reunion['hora']}</p>
                    <p>{$reunion['tutor']}</p>
                </div>
                ";
            }
            ?>
        </div>
    </div>
    <script>
        function toggleMenu() {
            const menu = document.getElementById('menu');
            menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
        }
    </script>
</body>
</html>
