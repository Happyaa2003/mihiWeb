<?php

    $db_server="localhost";
    $db_user="root";
    $db_password="";
    $db_name="mihisaradb";

    $conn;
    try{
        $conn=mysqli_connect($db_server,$db_user,$db_password,$db_name);
        if (!$conn) {
            throw new Exception("Connection failed: " . mysqli_connect_error());
        } else {
            echo "Connected successfully!";
        }
    }
    catch(mysqli_sql_exception){
        echo "Could not Connected";
        header("Location:404.html");
                    exit();
    }
?>