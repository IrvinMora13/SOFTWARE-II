<?php
    require "../../includes/funciones.php";
    require "../../includes/config/database.php";

    $auth = estaAutenticado();

    if (!$auth) {
        header('Location: /');
    }

    incluirTemplate('header');

    $db = conectarDB();

    $dia = '';
    $fecha = '';
    $hora = '';

    $reuniones = [];

    $matricula = $_SESSION['matricula'];


    $query = "SELECT * FROM asignaciones WHERE tutor_matricula = '$matricula'";
    $consulta = mysqli_query($db, $query);
    $matricula_estudiante = mysqli_fetch_assoc($consulta);
    $estudiante = $matricula_estudiante['estudiante_matricula'];
    
    

    $query3 = "SELECT * FROM solicitud_tutorias WHERE id = '$estudiante'";
    $consulta3 = mysqli_query($db, $query3);
    $solicitud_tutorias = mysqli_fetch_assoc($consulta3);
    
    
?>

<body>

    <div class="content_tutor">
        <h1>Agenda</h1>
        <div class="week_tutor">
            <span>Semana 22 - 26 Abril 2024</span>
        </div>
        <div class="calendar_tutor">
            <?php
            
            $reuniones = [
                ['dia' => $solicitud_tutorias['fecha'], 'hora' => $solicitud_tutorias['hora'], 'tutor' => $solicitud_tutorias['nombre'], 'tipo' =>$solicitud_tutorias['tipo'], 'motivo' =>$solicitud_tutorias['motivo'] ],
                ['dia' => 'Martes', 'hora' => '9:00 AM - 10:00 AM', 'tutor' => 'Jane Doe'],
                ['dia' => 'Miércoles', 'hora' => '9:00 AM - 10:00 AM', 'tutor' => 'Jane Doe'],
                ['dia' => 'Jueves', 'hora' => '9:00 AM - 10:00 AM', 'tutor' => 'Jane Doe'],
                ['dia' => 'Viernes', 'hora' => '9:00 AM - 10:00 AM', 'tutor' => 'Jane Doe'],
            ];

            foreach ($reuniones as $reunion) {
                echo "
                <div class='card'>
                    <h1>{$reunion['tipo']}</h1>
                    <h4>{$reunion['dia']}<h4>
                    <h4>{$reunion['hora']}</h4>
                    <p>Alumno: {$reunion['tutor']}</p>
                    <p>Motivo: {$reunion['motivo']}</p>
                </div>
                ";
            }
            ?>
        </div>
        
    </div>
    <div>
            <button onclick="goBack()">Ir Atrás</button>
    </div>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>
