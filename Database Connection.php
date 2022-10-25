<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "Lab_10";


    try {
        $conn = mysqli_connect($servername, $username, $password, $db);
    }
    catch (mysqli_sql_exception $e) {
        die("Connection failed:" . mysqli_connect_errno() . "=" . mysqli_connect_error());
    }
 ?>   
