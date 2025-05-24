<?php

function connection() {
    $host = "localhost";
    $user = "u978931113_syb_user";
    $pass = "]q[W4^Sv"; 
    $db = "u978931113_syb";

    $con = mysqli_connect($host, $user, $pass, $db);

    if (!$con) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    return $con;
}

?>