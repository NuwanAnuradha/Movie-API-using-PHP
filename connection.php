<?php

    error_reporting(0);
    //Getting DB Credentials-Nnuwan Anuradha

    $db_name = "movies_api";
    $mysql_username = "root";
    $mysql_pass = "1234";
    $server_name = "localhost";

    //Connection--> Connect to the DB
    $con = mysqli_connect($server_name,$mysql_username,$mysql_pass,$db_name);

    //If We can not Connect to the DB
    if(!$con){
        echo '{"message":"Unable to Connect the DataBase"}';
        die();
    }
?>