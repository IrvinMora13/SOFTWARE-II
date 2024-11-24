<?php
    require "../../includes/funciones.php";

    $auth = estaAutenticado();

    if (!$auth) {
        header('Location: /');
    }

    incluirTemplate('header');
?>

<body>
    <main class="main-content_eva">
        <h2>Sesiones por evaluar:</h2>
        <div class="filter_eva">Más reciente</div>
        <div class="card_eva">
            <p><strong>Fecha de la sesión:</strong> 2/10/2024</p>
            <p><strong>Tutor:</strong> Nombre del tutor</p>
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
                <textarea placeholder="Ayuda al tutor a mejorar sus sesiones de tutoría con tu comentario."></textarea>
            </div>
        </div>
    </main>
</body>
</html>
