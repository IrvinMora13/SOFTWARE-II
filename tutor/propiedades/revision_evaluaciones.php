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
            <h2>Título del Contenedor 1</h2> 
            <p>Este es el texto dentro del primer contenedor. Puedes agregar más texto o modificar este según tus necesidades.</p>
        </div> 
        <div class="container_eva"> 
            <h2>Título del Contenedor 2</h2> 
            <p>Este es el texto dentro del segundo contenedor. Aquí también puedes ajustar el contenido como desees.</p> 
        </div> 
        <div class="container_eva"> 
            <h2>Título del Contenedor 3</h2> 
            <p>Este es el texto dentro del tercer contenedor. Modifica o expande el texto según tus necesidades.</p>
        </div>
    </div>
</body>
</html>
