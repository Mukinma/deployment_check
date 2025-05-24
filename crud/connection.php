<?php

function connection(){
    $host = "localhost";
    $user = "u978931113_syb_user";
    $password = "]q[W4^Sv";

    $bd = "u978931113_syb";

    $connect = mysqli_connect($host, $user, $password);

    mysqli_select_db($connect, $bd);

    return $connect;
};

?>