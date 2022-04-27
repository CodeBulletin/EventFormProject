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

        <!-- Style -->
        <link rel="stylesheet" href="./CSS/Index.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand fontB" href="./index.php"><b>Deshbandhu</b> College</a>
                <!-- <form class="form-dark" method="GET" action="./Events.php">
                    <input type="text" placeholder="Search" class="form-control dark font_style" id="search" name="search">
                </form> -->
                <div class="ms-auto" id="LINKS">
                    <ul class="navbar-nav">
                        <a class="nav-link fontA" aria-current="page" href="./AdminPanel.php">Admin Panel</a>
                        <li class="nav-item">
                            <a class="nav-link fontA" aria-current="page" href="./EventDetailsForm.php">Host An Event?</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="EventList">
            <?php while($row = $res->fetch_assoc()) { ?>
            <div class="EventDiv fontA fontWhite">
                <span class="display-3 fontB"><?php echo $row["Topic"] ?></span>
                <span class="display-4">
                    <?php 
                        $days = (int)$row['NumDays'] - 1;
                        $date = new DateTime($row["DateTime"]);
                        if($days == 1) {
                            echo $date->format("Y-m-d");
                        }
                        else {
                            $start = clone $date;
                            $end = (clone $date)->modify("+$days day");
                            echo $start->format("Y-m-d") . " to " . $end->format("Y-m-d");
                        }
                        echo " at " . $date->format("h:i A");
                    ?>
                </span>
                <span class="h2">Department/Organization: <?php echo $row['Department'] ?></span>
                <div class="Grid3">
                    <span class="h5">Mode: <?php echo $row['Mode']?></span>
                    <span class="h5">Type of event: <?php echo $row['Type']?></span>
                    <span class="h5">Aegis: <?php echo $row['Aegis']?></span>
                </div>
            </div>
            <?php } ?>
        </div>
    </body>
</html>

<?php exit(); ?>