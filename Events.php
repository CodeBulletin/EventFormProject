<?php
    require "./Database.php";

    $sort = isset($_GET['sort']) ? $_GET['sort'] : "DateTime";
    $By = isset($_GET['order']) ? $_GET['order'] : "ASC";
    $By = $By == "ASC" || $By == "DESC" ? $By : "ASC";

    $sql = "SELECT * FROM $TableName ORDER BY `$sort` $By";
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
                    <?php while($col = $cols->fetch_assoc()) { ?>
                        <th>
                            <?php
                                $a = $col['Field'] == $sort ? ($By == "ASC" ? "DESC" : "ASC") : "ASC";
                            ?>
                            <a href=<?php echo "\"?sort=". $col['Field'] . "&order=" . $a . "\""; ?>>
                                <?php echo $col['Field']; ?>
                            </a>
                        </th>
                    <?php } ?>
                </tr>
                <?php while($row = $res->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row["EventID"] ?></td>
                        <td><?php echo $row["Topic"] ?></td>
                        <td><?php echo $row["Type"] ?></td>
                        <td><?php echo $row["DateTime"] ?></td>
                        <td><?php echo $row["NumDays"] ?></td>
                        <td><?php echo $row["Mode"] ?></td>
                        <td><?php echo $row["Department"] ?></td>
                        <td><?php echo $row["Guests"] ?></td>
                        <td><?php echo $row["Host"] ?></td>
                        <td><?php echo $row["HostContactNo"] ?></td>
                        <td><?php echo $row["Faculty"] ?></td>
                        <td><?php echo $row["Aegis"] ?></td>
                        <td><?php echo $row["OnYoutube"] ?></td>
                        <td><?php echo $row["Poster"] ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </body>
</html>

<?php exit(); ?>