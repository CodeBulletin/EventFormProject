<?php
    $mysql_servername = 'localhost'; // server name
    $mysql_username = 'root'; // Sql user name
    $password = ""; // Sql user password
    $dbname = 'collegeevents'; // Database Name
    
    $conn = mysqli_connect($mysql_servername, $mysql_username, $password, $dbname); // Connecting to database (Method: MySQLi Procedural)

    if ($conn->connect_error) { // Checking if the connection was successful 
        die("Connection failed: " . $conn->connect_error); // post error if it is not
    }

    $TableName = "events"; // Table Name;
    $UserTable = "usertable";
?>