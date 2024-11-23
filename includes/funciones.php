<?php
    require 'app.php';

    function incluirTemplate(string $name) {
        include TEMPLATES_URL . "/$name.php";
        
    }   