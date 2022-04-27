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

    if(!isset($_GET['Column']) || !isset($_GET['Value'])) {
        $sql = "SELECT `EventID`, `Topic`, `Type`, `AcademicYear`, `DateTime`, `NumDays`, `Mode`, `Department`, `Guests`, `Participants`, `Faculty`, `Aegis`, `Poster` FROM $TableName ORDER BY `$sort` $By";
    }
    else {
        $C = $_GET['Column'];
        $V = $_GET['Value'];
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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <!-- JS -->
        <script src="./JS/AdminPanel.js" defer></script>
    </head>
    <body>
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <form action="./AdminPanel.php" method="GET" class="d-flex">
                    <div class="input-group me-2">
                        <span class="input-group-text" id="basic-addon1">Column</span>
                        <select name="Column" id="Column" required class="form-control">
                            <?php while($col = $cols->fetch_assoc()) {
                                if ($col['Field'] != 'About') { ?>
                                    <option <?php if (isset($C) && $C == $col['Field']) echo "Selected";?>>
                                        <?php echo $col['Field']; ?>
                                    </option>
                            <?php }} ?>
                        </select>
                        <span class="input-group-text" id="basic-addon1">Find</span>
                        <input type="text" name="Value" id="Value" required class="form-control">
                        <button type="submit" class="btn btn-outline-success">Search</button>
                        <button class="btn btn-outline-success" onclick=<?php echo "\"window.location.href = './AdminPanel.php';\""; ?>>Show All</button>
                    </div>
                    <div class="collapse navbar-collapse">
                        <input type="text" name="sort" id="sort" value=<?php echo "\"$sort\""; ?>>
                        <input type="text" name="order" id="order" value=<?php echo "\"$By\""; ?>>
                    </div>
                    <button class="float-end btn btn-info" onclick=<?php echo "\"window.location.href = './Logout.php?';\""; ?>>Logout</button>
                </form>
            </div>
        </nav>
        <div class="table_div">
            <table>
                <tr>
                    <th class="text-center">Delete</th>
                    <?php $cols->data_seek(0); ?>
                    <?php while($col = $cols->fetch_assoc()) { 
                        if ($col['Field'] != 'About') { ?>
                            <th class="text-center">
                                <?php
                                    $a = $col['Field'] == $sort ? ($By == "ASC" ? "DESC" : "ASC") : "ASC";
                                ?>
                                <a href=<?php
                                    if (isset($C) && isset($V)) echo "\"?sort=". $col['Field'] . "&order=" . $a . "&Column=" . $C . "&Value=" . $V .  "\"";
                                    else echo "\"?sort=". $col['Field'] . "&order=" . $a . "\""; ?>>
                                    <?php echo $col['Field']; ?>
                                </a>
                            </th>
                    <?php }} ?>
                </tr>
                <?php while($row = $res->fetch_assoc()) { ?>
                    <tr>
                        <?php $eventID = $row['EventID']; ?>
                        <td><button class="btn btn-danger" onclick=<?php echo "\"Confirm('$eventID')\""; ?>>Delete</button></td>
                        <?php 
                            $cols->data_seek(0);
                            while($col = $cols->fetch_assoc()) { 
                                if ($col['Field'] != 'About') {?>
                                    <td>
                                        <?php echo $row[$col['Field']]; ?>
                                    </td>
                        <?php }} ?>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </body>
</html>

<?php exit(); ?>