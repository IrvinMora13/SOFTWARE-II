<?php
    require "../../includes/funciones.php";

    $auth = estaAutenticado();

    if (!$auth) {
        header('Location: /');
    }

    incluirTemplate('header');
?>

<body>

    <div class="content_tutor">
        <h1>Agenda</h1>
        <div class="week_tutor">
            <span>Semana 22 - 26 Abril 2024</span>
        </div>
        <div class="calendar_tutor">
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
