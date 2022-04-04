<?php
    require "./Database.php";

    $sql = "SELECT * FROM $TableName ORDER BY `DateTime`";
    $res = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>

        <!-- Bootstrap for navbar -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

        <!-- Stylesheet -->
        <link rel="stylesheet" href="./CSS/Events.css">
    </head>
    <body>
        <div>
            <table>
                <tr>
                    <th>EventID</th>
                    <th>Topic</th>
                    <th>Event Type</th>
                    <th>Date and Time</th>
                    <th>Number of days</th>
                    <th>Mode</th>
                    <th>Department</th>
                    <th>Guests</th>
                    <th>Host</th>
                    <th>Host Contact Number</th>
                    <th>Faculty</th>
                    <th>Aegis</th>
                    <th>OnYoutube</th>
                    <th>Poster</th>
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