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

    $query = "SELECT * FROM evaluacion_tutor WHERE matricula_tutor = '$matricula'";
    $consulta = mysqli_query($db, $query);
    $resultado = mysqli_fetch_assoc($consulta);

    $matricula_alumno = $resultado['matricula'];
    
    $query2 = "SELECT nombre_completo FROM usuarios WHERE matricula = '$matricula_alumno'";
    $consulta2 = mysqli_query($db, $query2);
    $alumno = mysqli_fetch_assoc($consulta2);
    

    $query3 = "SELECT comentario FROM evaluacion_tutor WHERE matricula = '$matricula_alumno'";
    $consulta3 = mysqli_query($db, $query3);
    $alumno_comentario = mysqli_fetch_assoc($consulta3);


?>

<body>
    <div class="content_eva">
        <h1>Evaluaciones</h1>
        <div class="container_eva"> 
            <h2><?php echo isset($alumno['nombre_completo']) ? htmlspecialchars($alumno['nombre_completo']) : 'Evaluacion pendiente'; ?></h2> 
            <p><?php echo isset($alumno_comentario['comentario']) ? htmlspecialchars($alumno_comentario['comentario']) : '...'; ?></p>
        </div> 
        <div class="container_eva"> 
            <h2>Nombre alumno 2</h2> 
            <p>Retroalimentación...</p> 
        </div> 
        <div class="container_eva"> 
            <h2>Nombre alumno 3</h2> 
            <p>Retroalimentación...</p>
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
