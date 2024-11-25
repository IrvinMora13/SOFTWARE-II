<?php
    require "../../includes/funciones.php";
    require "../../includes/config/database.php";

    
    $auth = estaAutenticado();

    if (!$auth) {
        header('Location: /');
    }

    incluirTemplate('header');

    $db = conectarDB();

    $motivo = '';
    $fecha = '';
    $hora = '';
    $tipo = '';

    $errores = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $motivo = $_POST['motivo-tutoria'];
        $fecha = $_POST['fecha'];
        $hora = $_POST['hora'];
        $tipo = $_POST['tipo-tutoria'];

        

        $matricula = $_SESSION["matricula"];

        if (empty($errores)){
            $query = "SELECT * FROM asignaciones WHERE estudiante_matricula = '$matricula'";
            $resultado = mysqli_query($db, $query);
            
            $nombre = $_SESSION["nombre"];
            if ($resultado ->num_rows) {
                $usuario = mysqli_fetch_assoc($resultado);

                $query2 = "INSERT INTO solicitud_tutorias (id,nombre,motivo,fecha,hora,tipo) VALUES ('$matricula', '$nombre','$motivo', '$fecha', '$hora','$tipo' )";
                $resultado2 = mysqli_query($db, $query2);
                if ($resultado2) {
                    echo "Enviado Correctamente";
                }
            }
        }
    }
?>

<body>
    <div class="content">
        <div class="form-container">
            <h2>Solicitud de tutoría</h2>
            <p class="subtitle">Rellena el formulario</p>
            <form method="POST">
                <label for="motivo-tutoria">Motivo de la tutoría</label>
                <textarea id="motivo-tutoria" name="motivo-tutoria"></textarea>

                <label for="horario">Horario</label>
                <input type="text" id="horario" name="horario" readonly placeholder="Seleccione fecha y hora">

                <div class="datetime-buttons">
                    <input type="date" id="fecha" name = "fecha" class="date-picker">
                    <input type="time" id="hora"  name = "hora" class="time-picker">
                    <button type="button" class="update-datetime" onclick="actualizarHorario()">Actualizar horario</button>
                </div>

                <label for="tipo-tutoria">Tipo de tutoría</label>
                <input type="text" id="tipo-tutoria" name="tipo-tutoria">

                <div class="buttons">
                    <button type="button" class="cancel" onclick="window.location.href='alumnos.php'">Cancelar</button>
                    <button type="submit" class="submit">Enviar solicitud</button>
                </div>
            </form>
        </div>

        <div class="info-box">
            <p>La solicitud de tutoría será enviada y estará a la espera de confirmación del tutor.</p>
        </div>
    </div>
    <div>
            <button onclick="goBack()">Ir Atrás</button>
        </div>
    <script>
        // Función para mostrar/ocultar el menú
        function toggleMenu() {
            const menu = document.getElementById('menu');
            menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
        }

        // Función para actualizar el campo de horario
        function actualizarHorario() {
            const fecha = document.getElementById('fecha').value;
            const hora = document.getElementById('hora').value;

            // Validar si se seleccionó fecha y hora
            if (fecha && hora) {
                document.getElementById('horario').value = `${fecha} ${hora}`;
            } else {
                alert('Por favor seleccione una fecha y hora válidas.');
            }
        }

        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>
