<?php
    $mysql_servername = 'localhost'; // server name
    $mysql_username = 'admin'; // Sql user name
    $password = "1134@aaAA"; // Sql user password
    $dbname = 'CollegeEvents'; // Database Name
    
    $conn = mysqli_connect($mysql_servername, $mysql_username, $password, $dbname); // Connecting to database (Method: MySQLi Procedural)

    if ($conn->connect_error) { // Checking if the connection was successful 
        die("Connection failed: " . $conn->connect_error); // post error if it is not
    }

    $TableName = "Events"; // Table Name;
?>