<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambio de Disponibilidad de horario</title>
    <link rel="stylesheet" href="./build/css/app.css">
</head>
<body>
    <header>
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
            <span>Apellido Nombre</span>
            <img src="src/Escudo_UACH.png" alt="Menú">
        </div>
    </header>

    <div class="content">
        <div class="form-container">
            <h2>Cambio de disponibilidad de horario</h2>
            <p class="subtitle">Rellena el formulario</p>
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
                    <button type="button" class="cancel" onclick="window.location.href='./tutor/index.php'">Cancelar</button>
                    <button type="submit" class="submit">Enviar solicitud</button>
                </div>
            </form>
        </div>

        <div class="info-box">
            <p>La solicitud será enviada y estará a la espera de confirmación del departamento de tutorías.</p>
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
