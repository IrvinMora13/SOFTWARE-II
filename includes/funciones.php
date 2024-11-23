<?php
    require 'app.php';

    function incluirTemplate(string $name) {
        include TEMPLATES_URL . "/$name.php";
        
    }   


    function estaAutenticado() : bool {
        session_start();

        $auth = $_SESSION['login'];
        if ($auth) {
            return true;
      
        }

        return false;
    }