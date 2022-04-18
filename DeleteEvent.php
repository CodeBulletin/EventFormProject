<?php 
    session_start();
    require "Database.php";

    $eventID = $_GET["EventID"];

    $user = isset($_SESSION["UserID"]) ? $_SESSION["UserID"] : null;
    $password = isset($_SESSION["Password"]) ? $_SESSION["Password"] : null;
    if (isset($user) && isset($password)) {
        $sql = "SELECT * FROM $UserTable Where `UserID` = '$user' AND `UserPassword` = '$password'";
        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res) == 0) {
            echo "<meta http-equiv=\"refresh\" content=\"0; url = ./UserLogin.php\" />";
            exit();
        }
    } 
    else {
        echo "<meta http-equiv=\"refresh\" content=\"0; url = ./UserLogin.php\" />";
        exit();
    }

    $sql = "DELETE FROM $TableName WHERE `EventID` = '$eventID'";
    mysqli_query($conn, $sql);
    
    echo "<meta http-equiv=\"refresh\" content=\"1; url = ./AdminPanel.php\" />";
    echo "<h4>Deleted Event with event id: $eventID Redirecting in 1 secs</h4>";

    exit();
?>