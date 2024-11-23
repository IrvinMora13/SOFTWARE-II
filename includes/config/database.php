<?php

function conectarDB() {
    $db = mysqli_connect('localhost:3307', 'root', '24282213Mys.', 'stuach');

    if ($db) {
        echo "Se conecto";
    } else {
        echo "Error no se conecto";
    }
}