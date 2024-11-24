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
    $alumno = $_SESSION['nombre'];

    $query = "SELECT * FROM asignaciones WHERE estudiante_matricula = '$matricula'";
    $resultado = mysqli_query($db, $query);
    $usuario = mysqli_fetch_assoc($resultado);
    $tutorMatricula = $usuario['tutor_matricula'];

    $query2 = "SELECT nombre_completo FROM usuarios WHERE matricula = '$tutorMatricula'";
    $consulta2 = mysqli_query($db, $query2);
    $tutor = mysqli_fetch_assoc($consulta2);

    $comentarios = '';
    $evaluacion = '';

    $errores = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $comentarios = $_POST['comentarios'];
        $evaluacion = $_POST['evaluacion'];

        if (empty($evaluacion)) {
            $errores[] = "Debe seleccionar una puntuación.";
        }

        if (empty($errores)) {
            $query3 = "INSERT INTO evaluacion_tutor (matricula, evaluacion, comentario, matricula_tutor) 
                       VALUES ('$matricula', '$evaluacion', '$comentarios', '$tutorMatricula')";
            $consulta3 = mysqli_query($db, $query3);

            if ($consulta3) {
                header("Location: alumnos.php");
            } else {
                $errores[] = "Hubo un error al guardar la evaluación.";
            }
        }
    }
?>

<body>
    <main class="main-content_eva">
        <h2>Sesiones por evaluar:</h2>
        <div class="filter_eva">Más reciente</div>
        <div class="card_eva">
            <form method="POST">
                <p><strong>Fecha de la sesión:</strong> 2/10/2024</p>
                <p><strong>Tutor:</p>
                <span><?php echo isset($tutor['nombre_completo']) ? htmlspecialchars($tutor['nombre_completo']) : 'Tutor Anónimo'; ?></span>
                <div class="rating_eva">
                    <label for="evaluacion">Puntuación:</label>
                    <select name="evaluacion" id="evaluacion" required>
                        <option value="">Seleccione</option>
                        <option value="1">1 - Muy mala</option>
                        <option value="2">2 - Mala</option>
                        <option value="3">3 - Neutral</option>
                        <option value="4">4 - Buena</option>
                        <option value="5">5 - Muy buena</option>
                    </select>
                </div>
                <div class="comments">
                    <label>Comentarios (Opcional):</label>
                    <textarea placeholder="Ayuda al tutor a mejorar sus sesiones de tutoría con tu comentario." name="comentarios"></textarea>
                </div>
                <div class="buttons">
                    <button type="button" class="cancel" onclick="window.location.href='alumnos.php'">Cancelar</button>
                    <button type="submit" class="submit">Enviar</button>
                </div>
            </form>
            <?php if (!empty($errores)) : ?>
                <div class="errors">
                    <?php foreach ($errores as $error) : ?>
                        <p><?php echo htmlspecialchars($error); ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </main>
</body>
</html>
