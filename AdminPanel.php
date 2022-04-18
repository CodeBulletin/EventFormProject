<?php
    session_start();

    require "./Database.php";

    $sort = isset($_GET['sort']) ? $_GET['sort'] : "DateTime";
    $By = isset($_GET['order']) ? $_GET['order'] : "ASC";
    $By = $By == "ASC" || $By == "DESC" ? $By : "ASC";

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

    if(!isset($_POST['Column']) || !isset($_POST['Value'])) {
        $sql = "SELECT `EventID`, `Topic`, `Type`, `AcademicYear`, `DateTime`, `NumDays`, `Mode`, `Department`, `Guests`, `Participants`, `Faculty`, `Aegis`, `Poster` FROM $TableName ORDER BY `$sort` $By";
    }
    else {
        $C = $_POST['Column'];
        $V = $_POST['Value'];
        $sql = "SELECT `EventID`, `Topic`, `Type`, `AcademicYear`, `DateTime`, `NumDays`, `Mode`, `Department`, `Guests`, `Participants`, `Faculty`, `Aegis`, `Poster` FROM $TableName WHERE `$C` LIKE '%$V%' ORDER BY `$sort` $By";
    }
    $res = mysqli_query($conn, $sql);

    $sql = "DESCRIBE `$TableName`";
    $cols = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Events Table</title>

        <!-- Stylesheet and Icon -->
        <link rel="stylesheet" href="./CSS/Events.css">
    </head>
    <body>
        <button onclick=<?php echo "\"window.location.href = './Logout.php?';\""; ?>>Logout</button><br>
        <form action="./AdminPanel.php" method="POST">
            Column: 
            <select name="Column" id="Column" required>
                <?php while($col = $cols->fetch_assoc()) {
                    if ($col['Field'] != 'About') { ?>
                        <option>
                            <?php echo $col['Field']; ?>
                        </option>
                <?php }} ?>
            </select>
            | Value:
            <input type="text" name="Value" id="Value" required>

            <button type="submit">Search</button>
        </form>
        <div>
            <table>
                <tr>
                    <?php $cols->data_seek(0); ?>
                    <?php while($col = $cols->fetch_assoc()) { 
                        if ($col['Field'] != 'About') { ?>
                            <th>
                                <?php
                                    $a = $col['Field'] == $sort ? ($By == "ASC" ? "DESC" : "ASC") : "ASC";
                                ?>
                                <a href=<?php echo "\"?sort=". $col['Field'] . "&order=" . $a . "\""; ?>>
                                    <?php echo $col['Field']; ?>
                                </a>

                            </th>
                    <?php }} ?>
                    <th>Delete</th>
                </tr>
                <?php while($row = $res->fetch_assoc()) { ?>
                    <tr>
                        <?php 
                        $eventID = $row['EventID'];
                        $cols->data_seek(0);
                        while($col = $cols->fetch_assoc()) { 
                            if ($col['Field'] != 'About') {?>
                                <td>
                                    <?php echo $row[$col['Field']]; ?>
                                </td>
                        <?php }} ?>
                        <td><button onclick=<?php echo "\"window.location.href = './DeleteEvent.php?EventID=$eventID';\""; ?>>Delete</button></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </body>
</html>

<?php exit(); ?>