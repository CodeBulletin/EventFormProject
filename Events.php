<?php
    require "./Database.php";

    $sort = isset($_GET['sort']) ? $_GET['sort'] : "DateTime";
    $By = isset($_GET['order']) ? $_GET['order'] : "ASC";
    $By = $By == "ASC" || $By == "DESC" ? $By : "ASC";

    $sql = "SELECT `EventID`, `Topic`, `Type`, `AcademicYear`, `DateTime`, `NumDays`, `Mode`, `Department`, `Guests`, `Participants`, `Faculty`, `Aegis`, `Poster` FROM $TableName ORDER BY `$sort` $By";
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
        <link rel="shortcut icon" href="./Icons/EventsIcon.png" type="image/x-icon">
    </head>
    <body>
        <div>
            <table>
                <tr>
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
                </tr>
                <?php while($row = $res->fetch_assoc()) { ?>
                    <tr>
                        <?php 
                            $cols->data_seek(0);
                            while($col = $cols->fetch_assoc()) {
                                if ($col['Field'] != 'About') { ?>
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