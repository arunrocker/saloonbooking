<?php
    $host ="localhost";
    $server_name="root";
    $password ="";
    $database ="saloon";
    $connect = mysqli_connect($host,$server_name,$password,$database);
    if($connect){
        
    }
    else{
        echo "sry:(";
    }


?>