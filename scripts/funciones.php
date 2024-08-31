<?php

    require 'app.php';

    function incluirComponent(string $name) {
        include COMPONENTS_URL . "/$name.php";
        
    }   

?>