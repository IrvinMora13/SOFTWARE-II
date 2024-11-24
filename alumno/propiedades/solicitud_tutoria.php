<?php
    require "../../includes/funciones.php";

    $auth = estaAutenticado();

    if (!$auth) {
        header('Location: /');
    }

    incluirTemplate('header');
?>

<body>
    <div class="content">
        <div class="form-container">
            <h2>Solicitud de tutoría</h2>
            <p class="subtitle">Rellena el formulario</p>
            <form>
                <label for="motivo-tutoria">Motivo de la tutoría</label>
                <textarea id="motivo-tutoria" name="motivo-tutoria"></textarea>

                <label for="horario">Horario</label>
                <input type="text" id="horario" name="horario" readonly placeholder="Seleccione fecha y hora">

                <div class="datetime-buttons">
                    <input type="date" id="fecha" class="date-picker">
                    <input type="time" id="hora" class="time-picker">
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
    </script>
</body>
</html>
