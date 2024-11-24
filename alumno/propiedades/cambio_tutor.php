<?php
    require "../../includes/funciones.php";
    require "../../includes/config/database.php";

    $auth = estaAutenticado();

    if (!$auth) {
        header('Location: /');
    }

    incluirTemplate('header');

    $db = conectarDB();

    $matricula = $_SESSION["matricula"];

    $query = "SELECT * FROM asignaciones WHERE estudiante_matricula = '$matricula'";
    $resultado = mysqli_query($db, $query);
    $usuario = mysqli_fetch_assoc($resultado);
    $tutorMatricula = $usuario['tutor_matricula'];

    $query2 = "SELECT nombre_completo FROM usuarios WHERE matricula = '$tutorMatricula'";
    $consulta2 = mysqli_query($db, $query2);
    $tutor = mysqli_fetch_assoc($consulta2);

    $nuevoTutor = '';
    $razonCambio = '';

    $errores = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $nuevoTutor = $_POST['nuevo-tutor'];
        $razonCambio = $_POST['razon-cambio'];

        
        
        if (empty($errores)) {
        
            $query3 = "INSERT INTO solicitud_tutor (id,nombre,motivo) VALUES ('$matricula', '$nuevoTutor','$razonCambio')";
            $consulta3 = mysqli_query($db, $query3);
            var_dump($consulta3);
            
            

        }
    }
?>

<body>
    <div class="content">
        <div class="form-container">
            <h2>Cambio de tutor</h2>
            <p class="subtitle">Actualizar información</p>
            <form method="POST">
                <label for="tutor-actual">Nombre del tutor actual</label>
                <span><?php echo isset($tutor['nombre_completo']) ? htmlspecialchars($tutor['nombre_completo']) : 'Tutor Anónimo'; ?></span>

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
