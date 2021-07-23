<?php
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="student";

    $conn=new mysqli($servername,$username,$password,$dbname);

    if($conn->connect_error)
    {
        die("Connection not done becouse of ".$conn->connect_error);
    }

    session_start();

?>