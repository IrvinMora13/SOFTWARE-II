<?php
    require "../../includes/funciones.php";

    $auth = estaAutenticado();

    if (!$auth) {
        header('Location: /');
    }

    incluirTemplate('header');
?>

<body>

    <div class="content_horario">
        <div class="form-container_horario">
            <h2>Cambio de disponibilidad de horario</h2>
            <p class="subtitle_horario">Rellena el formulario</p>
            <form>
                <label for="motivo-tutoria">Motivo del cambio de horario</label>
                <textarea id="motivo-tutoria" name="motivo-tutoria"></textarea>

                <label for="horario">Horario</label>
                <input type="text" id="horario" name="horario" readonly placeholder="Seleccione fecha y hora">

                <div class="datetime-buttons">
                    <input type="date" id="fecha" class="date-picker">
                    <input type="time" id="hora" class="time-picker">
                    <button type="button" class="update-datetime" onclick="actualizarHorario()">Actualizar horario</button>
                </div>

                <div class="buttons">
                    <button type="button" class="cancel" onclick="window.location.href='/index.php'">Cancelar</button>
                    <button type="submit" class="submit">Enviar solicitud</button>
                </div>
            </form>
        </div>

        <div class="info-box">
            <p>La solicitud será enviada y estará a la espera de confirmación del departamento de tutorías.</p>
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
