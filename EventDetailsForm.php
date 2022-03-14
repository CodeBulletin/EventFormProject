<?php 
    $hasError = isset($_GET['Message']);
    if($hasError) {
        $message = $_GET['Message'];
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Event Details</title>

        <!-- Style and JavaScript -->
        <link rel="stylesheet" href="CSS/EventForm.css">
        <script defer src="JS/EventForm.js"></script>

    </head>

    <body>
        <form class="form" action="" method="GET" id='form'>
            <!-- Head -->
            <div class = "form__item form__top"></div>
            <div class="form__item form__head">
                <h1 class="form__title">Event Details</h1>
                <div class="form__desc">
                    Instructions: 
                    <ol>
                        <li>All of the fields having <span class = "req"> * </span> are neceassery. <br></li>
                        <li>Link will be shared with the Organizing Faculty / Convenor / Cordinator of the Event within 24 hrs of receipt of request. <br></li>
                        <li>It is the responsibility of Organizing Team for handling of Offline and Online event. <br></li>
                        <li>Youtube Live will be done by the College, 5 mins before the start of the event. <br></li>
                    </ol>
                </div>

                <?php if($hasError) {?>
                    <hr>
                    <div class="form__backend__error">
                        <label class="form__backend__label">
                            <?php echo $message; ?>
                        </label>
                    </div>
                <?php }?>
            </div>

            <!-- details -->
            <div class="form__item" id="ORGNAME">
                <label for="OrgName" class="form__label"> Name of the organizing department / society / committee / cell: <span class = "req"> * </span> </label>
                <input type="text" placeholder="Your Answer" name="OrgName" id="OrgName" class="form__input" required>
                <label for="OrgName" class="form__error"> Name should only contain a-z, A-Z, . , ',' and space </label>
            </div>

            <div class="form__item" id="ORGFACNAME">
                <label for="OrgFacName" class="form__label"> Name of organizing faculty / convenor / cordinator of the event: <span class = "req"> * </span> </label>
                <input type="text" placeholder="Your Answer" name="OrgFacName" id="OrgFacName" class="form__input" required>
                <label for="OrgFacName" class="form__error"> Name should only contain a-z, A-Z, . , ',' and space </label>
            </div>

            <div class="form__item" id="TOPIC">
                <label for="Topic" class="form__label"> Name / Topic of event: <span class = "req"> * </span> </label>
                <input type="text" placeholder="Your Answer" name="Topic" id="Topic" class="form__input" required>
                <label for="Topic" class="form__error"> Name should only contain a-z, A-Z, 0-9, . , ',' and space </label>
            </div>

            <div class="form__item" id="GUEST">
                <label for="Guest" class="form__label"> Name of guest(s) / speaker(s) (NA if not applicable): <span class = "req"> * </span> </label>
                <input type="text" placeholder="Your Answer" name="Guest" id="Guest" class="form__input" required>
                <label for="Guest" class="form__error"> Name should only contain a-z, A-Z, . , ',' and space </label>
            </div>

            <div class="form__item" id="TYPE">
                <label class="form__label"> Type of event<span class = "req"> * </span> </label>
                <div>
                    <input type="radio" name="Type" id="T0" value="FDP" required class="form__radio" onclick="handleRadio(this, 'TYPE', 'OType');">
                    <label for="T0" class="form__radio__lable">FDP</label><br>
                </div>
                <div>
                    <input type="radio" name="Type" id="T1" value="Workshop" required class="form__radio" onclick="handleRadio(this, 'TYPE', 'OType');">
                    <label for="T1" class="form__radio__lable">Workshop</label><br>
                </div>
                <div>
                    <input type="radio" name="Type" id="T2" value="Seminar/Webinar" required class="form__radio" onclick="handleRadio(this, 'TYPE', 'OType');">
                    <label for="T2" class="form__radio__lable">Seminar / Webinar</label><br>
                </div>
                <div>
                    <input type="radio" name="Type" id="T3" value="Lecture Series" required class="form__radio" onclick="handleRadio(this, 'TYPE', 'OType');">
                    <label for="T3" class="form__radio__lable">Lecture series</label><br>
                </div>
                <div style="display: inline-block;">
                    <input type="radio" name="Type" id="T4" value="Other" required class="form__radio" onclick="handleRadio(this, 'TYPE', 'OType');">
                    <label for="T4" class="form__radio__lable">Other:</label>
                    <input type="text" class="form__radio__input" id="OType" name="OType">
                </div>
                <br> <label class="form__error"> Select/Enter a valid type </label>
            </div>

            <div class="form__item" id="ISONLINE">
                <label class="form__label">Mode of the event <span class = "req"> * </span> </label>
                <div>
                    <input type="radio" name="isOnline" id="O1" value="Offline" required class="form__radio">
                    <label for="O1" class="form__radio__lable">Offline</label><br>
                </div>
                <div style="display: inline-block;">
                    <input type="radio" name="isOnline" id="O2" value="Online" required class="form__radio">
                    <label for="O2" class="form__radio__lable">Online</label>
                </div>
            </div>

            <div class="form__item" id="DATETIME">
                <label for="OrgName" class="form__label"> Date & Time of event: <span class = "req"> * </span> </label>
                <input type="datetime-local" name="Datetime" id="Datetime" class="form__input" required>
                <label for="OrgName" class="form__error"> Enter a valid date </label>
            </div>

            <div class="form__item" id="DAYS">
                <label class="form__label"> Number of days <span class = "req"> * </span> </label>
                <div>
                    <input type="radio" name="Days" id="D1" value="1" required class="form__radio" onclick="handleRadio(this, 'DAYS', 'ODays');">
                    <label for="D1" class="form__radio__lable">1</label><br>
                </div>
                <div style="display: inline-block;">
                    <input type="radio" name="Days" id="D2" value="Other" required class="form__radio" onclick="handleRadio(this, 'DAYS', 'ODays');">
                    <label for="D2" class="form__radio__lable">Other:</label>
                    <input type="number" class="form__radio__input" id="ODays" name="ODays">
                </div>
                <br> <label class="form__error"> Enter valid number of days </label>
            </div>

            <div class="form__item" id="AGIES">
                <label class="form__label"> Is event under the agies of:</label> <br>
                <input type="checkbox" class="form__checkbox" name="IQAC" id="IQAC"> <label for="IQAC" class="form__radio__lable">IQAC</label> <br>
                <input type="checkbox" class="form__checkbox" name="DBTStar" id="DBTStar"> <label for="DBTStar" class="form__radio__lable">DBT*</label>
            </div>

            <div class="form__item" id="YOUTUBE">
                <label class="form__label">Would You like to make event live on Youtube channel of college <span class = "req"> * </span> </label>
                <div>
                    <input type="radio" name="Youtube" id="Y1" value="Yes" required class="form__radio">
                    <label for="Y1" class="form__radio__lable">Yes</label><br>
                </div>
                <div style="display: inline-block;">
                    <input type="radio" name="Youtube" id="Y2" value="No" required class="form__radio">
                    <label for="Y2" class="form__radio__lable">No</label>
                </div>
            </div>

            <div class="form__item" id="HOST">
                <label for="Host" class="form__label"> Name & contact no. of person who will host the meeting (Separated by ,): <span class = "req"> * </span> </label>
                <input type="text" placeholder="Your Answer" name="Host" id="Host" class="form__input" required>
                <label for="Host" class="form__error"> Enter Valid Text </label>
            </div>

            <div class="form__item" id="FILE">
                <label for="Host" class="form__label"> Poster: <span class = "req"> * </span> </label>
                <input type="file" class="file__in form__input" name="File" id="File" required>
                <label for="File" class="form__error"> Enter Valid Image(.png, .jpg, .jpeg, .bmp) or PDF file </label>
            </div>

            <!-- Submit and Reset -->
            <div class="form__end">
                <button type="submit" class="form__btn submit">Submit</button>
                <button type="reset" class="form__btn reset" onclick="onClearClick()">Clear Response</button>
                <span class="EndText"> <b>Deshbandhu</b> College </span>
            </div>
        </form>
    </body>
</html>

<?php exit(); ?>