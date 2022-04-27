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

    $sql = "SELECT `Poster` FROM $TableName WHERE `EventID` = '$eventID'";
    $res = mysqli_query($conn, $sql);
    $poster_name = $res->fetch_assoc()['Poster'];

    unlink("./POSTERS/$poster_name");
    $sql = "DELETE FROM $TableName WHERE `EventID` = '$eventID'";
    mysqli_query($conn, $sql);
    
    echo "<meta http-equiv=\"refresh\" content=\"0; url = ./AdminPanel.php\" />";

    exit();
?>