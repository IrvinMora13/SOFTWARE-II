<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pantalla Cambio de Tutor</title>
    <link rel="stylesheet" href="src/scss/cambio_tut.css">
</head>
<body>
    <header>
        <div class="left">ST-UACH</div>
        <div class="right">
            Nombre
            <div class="menu-icon" onclick="toggleMenu()">☰</div>
            <div class="dropdown-menu" id="menu">
                <a href="#">Solicitar tutoría</a>
                <a href="#">Agenda</a>
                <a href="#">Evaluar sesión de tutoría</a>
            </div>
        </div>
    </header>

    <div class="content">
        <div class="form-container">
            <h2>Cambio de tutor</h2>
            <p class="subtitle">Actualizar información</p>
            <form>
                <label for="tutor-actual">Nombre del tutor actual</label>
                <input type="text" id="tutor-actual" name="tutor-actual">

                <label for="nuevo-tutor">Nuevo tutor</label>
                <input type="text" id="nuevo-tutor" name="nuevo-tutor">

                <label for="razon-cambio">Razón del cambio</label>
                <textarea id="razon-cambio" name="razon-cambio"></textarea>

                <div class="buttons">
                    <button type="button" class="cancel" onclick="window.location.href='alumnos.php'">Cancelar</button>
                    <button type="submit" class="submit">Enviar</button>
                </div>
            </form>
        </div>

        <div class="info-box">
            <p>El cambio de tutor no es seguro<br>ya que dependerá de la disponibilidad del tutor</p>
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
