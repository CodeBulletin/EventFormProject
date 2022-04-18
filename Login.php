<?php 
    session_start();
    $UserID = $_POST["UserID"];
    $Password = $_POST["Password"];

    function SendMessage($message) { // Function to send message back to the form
        header("Location: ./UserLogin.php?message=$message");
        die();
    }

    require "./Database.php";

    $sql = "SELECT * FROM $UserTable WHERE `UserID` = '$UserID' AND `UserPassword` = '$Password'";
    $res = mysqli_query($conn, $sql);

    if (mysqli_num_rows($res) == 0) {
        SendMessage("Wrong User ID or Password");
    }

    $_SESSION['UserID'] = $UserID;
    $_SESSION['Password'] = $Password;

    echo "<meta http-equiv=\"refresh\" content=\"0; url = ./AdminPanel.php\" />";
?>