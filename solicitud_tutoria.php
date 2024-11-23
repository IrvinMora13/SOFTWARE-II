<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitud de Tutoría</title>
    <link rel="stylesheet" href="src/scss/solicitud_tut.css">
</head>
<body>
    <header>
        <div class="left">
            ST-UACH
            <div class="menu-icon" onclick="toggleMenu()">☰</div>
            <div class="dropdown-menu" id="menu">
                <a href="cambio_tutor.php">Cambio de tutor</a>
                <a href="#">Agenda</a>
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
            <h2>Solicitud de tutoría</h2>
            <p class="subtitle">Rellena el formulario</p>
            <form>
                <label for="motivo-tutoria">Motivo de la tutoría</label>
                <textarea id="motivo-tutoria" name="motivo-tutoria"></textarea>

                <label for="horario">Horario</label>
                <input type="text" id="horario" name="horario">

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
        function toggleMenu() {
            const menu = document.getElementById('menu');
            menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
        }
    </script>
</body>
</html>
