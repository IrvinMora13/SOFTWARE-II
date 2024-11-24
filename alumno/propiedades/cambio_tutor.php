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
            <h2>Cambio de tutor</h2>
            <p class="subtitle">Actualizar información</p>
            <form>
                <label for="tutor-actual">Nombre del tutor actual</label>
                <input type="text" id="tutor-actual" name="tutor-actual">

                <label for="nuevo-tutor">Nuevo tutor</label>
                <input type="text" id="nuevo-tutor" name="nuevo-tutor">

                <label for="razon-cambio">Motivo del cambio</label>
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
