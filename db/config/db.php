<?php



function conectDB($servername, $username, $password, $dbname) {
    $db = mysqli_connect($servername, $username, $password, $dbname);
    
    if (!$db) {
        die("Conexion fallida: " . mysqli_connect_error());
    }

    return $db; 
}
