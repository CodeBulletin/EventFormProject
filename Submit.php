<?php
    // Getting form data into variables
    $department = $_POST["OrgName"];
    $faculty = $_POST["OrgFacName"];
    $topic = $_POST["Topic"];
    $guests = $_POST["Guest"];
    $participants = $_POST["Participants"];
    $academicyear = $_POST["academicyear"];
    $event_type = $_POST["Type"];
    $event_type_text = $_POST["OType"];
    $is_online = $_POST["isOnline"];
    $datetime = new DateTime($_POST["Datetime"]);
    $days = $_POST["Days"];
    $days_text = $_POST["ODays"];
    $aegis_iqac = (!empty($_POST["IQAC"]) ? $_POST["IQAC"] : "No");
    $aegis_dbtstar = (!empty($_POST["DBTStar"]) ? $_POST["DBTStar"] : "No");
    $About = $_POST['About'];

    $poster = $_FILES["File"];

    $maxSize = 25600; // Maximum File size in Kilo Bytes 
    //Processsing Data

    if ($event_type == "Other") {
        $event_type = $event_type_text;
    }

    if ($days == "Other") {
        $days = $days_text; 
    }

    $days = (int)$days;
    $aegis = $aegis_iqac == "on" ? ($aegis_dbtstar == "on" ? "IQAC, DBT*" : "IQAC") : ($aegis_dbtstar == "on" ? "DBT*" : "None");

    // Error Checking

    function SendMessage($message) { // Function to send message back to the form
        header("Location: ./EventDetailsForm.php?message=$message");
        die();
    }

    function CheckName($name) {
        return preg_match('/^[A-Za-z0-9\s\.]+$/', $name); //Regex Test
    }

    function CheckNames($names) {
        return preg_match('/^[A-Za-z0-9\s\.\,]+$/', $names);
    }

    function CheckEvent($event) {
        return preg_match('/^[a-zA-Z0-9\,\.\s\/\\\]+$/', $event);
    }

    function ValidateDate($date) {
        return $date > new DateTime(date('Y-m-d H:i:s'));
    }

    $file_split = explode(".", $poster['name']); // Dividing the string using `.`
    $ext = strtolower($file_split[count($file_split)-1]); // Extracting the extension
    $check = in_array($ext, ["pdf", "png", "jpeg", "jpg", "bmp"]);

    if(!$check) {
        SendMessage("File is not an image or pdf");
    }

    $check = $poster['size'] > $maxSize;
    if(!$check) {
        SendMessage("File Size should be less then 25mb");
    }

    $check1 = CheckName($department);
    if(!$check1) {
        SendMessage("Enter a valid departement name");
    }

    $check2 = CheckName($faculty);
    if(!$check2) {
        SendMessage("Enter a valid faculty name");
    }

    $check3 = CheckName($topic);
    if(!$check3) {
        SendMessage("Enter a valid topic name");
    }

    if($guests < 0) {
        SendMessage("Enter a valid number of guests name");
    }
    
    if($participants < 0) {
        SendMessage("Enter a valid number of participants name");
    }

    $check5 = CheckEvent($event_type);
    if(!$check5) {
        SendMessage("Enter a valid event type");
    }

    $check6 = ValidateDate($datetime);
    if(!$check6) {
        SendMessage("Enter a valid date type");
    }

    if($days < 1) {
        SendMessage("Enter a valid number of days");
    }

    $check7 = str_word_count($About);
    if(!$check7) {
        SendMessage("Word Count for the about section needs to be between 50 and 100");
    }
    
    //Including DataBaseFile
    require "./Database.php";

    //Checking if an event with same name and same date exists
    $dt = $datetime->format("Y-m-d H:i:s");
    $sql = "SELECT `EventID` FROM $TableName Where `Topic`=\"$topic\" AND `DateTime`=\"$dt\"";
    $res = mysqli_query($conn, $sql);

    if($res->fetch_assoc() != null) {
        SendMessage("Same event already exists");
    }

    $t = time();
    $poster_name = "$t" . "_" . $poster['name'];

    $sql = "INSERT INTO $TableName VALUES (DEFAULT, '$topic', '$event_type', '$academicyear', '$dt', '$days', '$is_online', '$department', '$guests', '$participants', '$faculty', '$aegis', '$poster_name', '$About')";
    mysqli_query($conn, $sql);

    move_uploaded_file($poster['tmp_name'], "./POSTERS/$poster_name");

    $EventID = mysqli_insert_id($conn);
?>

<!-- Form Completion -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Event Details</title>

        <!-- Style -->
        <link rel="stylesheet" href="CSS/EventForm.css">

    </head>

    <body>
        <div class="form">
            <!-- Head -->
            <div class = "form__item form__top"></div>
            <div class="form__item form__head">
                <h1 class="form__title">Thanks for filling the form</h1>
                <div class="form__desc">
                    You have sumbitted the form correctly we will contact you shortly, <br>
                    your form id: <?php echo $EventID; ?><br>
                    <a href="./index.php">Fill another form?</a>
                </div>
            </div>
            <!-- Footer(ish) -->
            <div class="form__end">
                <span class="EndText"> <b>Deshbandhu</b> College </span>
            </div>
        </div>
    </body>
</html>

<?php exit();?>