<?php
    require "../../includes/funciones.php";

    $auth = estaAutenticado();

    if (!$auth) {
        header('Location: /');
    }

    incluirTemplate('header');
?>

<body>
    <div class="content_eva">
        <h1>Evaluaciones</h1>
        <div class="container_eva"> 
            <h2>Nombre Alumno 1</h2> 
            <p>Retroalimentación...</p>
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
    <script>
        function toggleMenu() {
            const menu = document.getElementById('menu');
            menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
        }
    </script>
</body>
</html>
