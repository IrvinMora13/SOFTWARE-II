<?php
    require "../../includes/funciones.php";

    $auth = estaAutenticado();

    if (!$auth) {
        header('Location: /');
    }

    incluirTemplate('header');
?>
    <main class='contenedor'>
        <h1>Borrar</h1>
    </main>

<?php
  incluirTemplate('footer');
?>
