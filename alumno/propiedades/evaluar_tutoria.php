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

    $errores = [];


    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $comentarios = $_POST['comentarios'];
        if (empty($errores)) {
        
            $query3 = "INSERT INTO evaluacion_tutor (matricula,evaluacion,comentario,matricula_tutor) VALUES ('$matricula',5,'$comentarios', '$tutorMatricula')";
            $consulta3 = mysqli_query($db, $query3);
            var_dump($consulta3);
            
            

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
                    <label>Puntuación:</label>
                    <div class="stars">
                        <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                    </div>
                    <div class="legend">
                        <span>Muy mala</span>
                        <span>Muy buena</span>
                    </div>
                </div>
                <div class="comments">
                    <label>Comentarios (Opcional):</label>
                    <textarea placeholder="Ayuda al tutor a mejorar sus sesiones de tutoría con tu comentario." name = 'comentarios'></textarea>
                </div>
                <div class="buttons">
                    <button type="button" class="cancel" onclick="window.location.href='alumnos.php'">Cancelar</button>
                    <button type="submit" class="submit">Enviar</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
