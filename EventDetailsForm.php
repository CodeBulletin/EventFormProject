<?php 
    $hasError = isset($_GET['message']);
    if($hasError) {
        $message = $_GET['message'];
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Event Details</title>

        <!-- Style, JavaScript and Icon-->
        <link rel="stylesheet" href="CSS/EventForm.css">
        <script defer src="JS/EventForm.js"></script>
        <link rel="shortcut icon" href="./Icons/FormIcon.png" type="image/x-icon">

    </head>

    <body>
        <form class="form" action="./Submit.php" method="POST" id='form' enctype="multipart/form-data">
            <!-- Head -->
            <div class = "form__item form__top"></div>
            <div class="form__item form__head">
                <h1 class="form__title">Event Details</h1>
                <div class="form__desc">
                    Instructions: 
                    <ol>
                        <li>All of the fields having <span class = "req"> * </span> are neceassery. <br></li>
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
                <label for="OrgName" class="form__label"> Name of the Organizing Department / Society / Committee / Cell: <span class = "req"> * </span> </label>
                <input type="text" placeholder="Your Answer" name="OrgName" id="OrgName" class="form__input" required>
                <label for="OrgName" class="form__error"> Name should only contain a-z, A-Z, . , ',' and space </label>
            </div>

            <div class="form__item" id="ORGFACNAME">
                <label for="OrgFacName" class="form__label"> Name of Organizing Faculty / Convenor / Cordinator of the event: <span class = "req"> * </span> </label>
                <input type="text" placeholder="Your Answer" name="OrgFacName" id="OrgFacName" class="form__input" required>
                <label for="OrgFacName" class="form__error"> Name should only contain a-z, A-Z, . , ',' and space </label>
            </div>

            <div class="form__item" id="TOPIC">
                <label for="Topic" class="form__label"> Name / Topic of Event: <span class = "req"> * </span> </label>
                <input type="text" placeholder="Your Answer" name="Topic" id="Topic" class="form__input" required>
                <label for="Topic" class="form__error"> Name should only contain a-z, A-Z, 0-9, . , ',' and space </label>
            </div>
            
            <div class="form__item" id="GUEST">
                <label for="Guest" class="form__label"> No. of Guest(s) / Speaker(s) (0 if not applicable): <span class = "req"> * </span> </label>
                <input type="number" placeholder="Your Answer" name="Guest" id="Guest" class="form__input" required>
                <label for="Guest" class="form__error"> Number of Guests should be +ve integer </label>
            </div>
            <div class="form__item" id="PARTICIPANT">
                <label for="Participant" class="form__label"> No. of Participant(s): <span class = "req"> * </span> </label>
                <input type="number" placeholder="Your Answer" name="Participants" id="Participants" class="form__input" required>
                <label for="Participants" class="form__error"> Number of participants should be +ve integer </label>
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
                <div>
                    <input type="radio" name="Type" id="T4" value="Conference" required class="form__radio" onclick="handleRadio(this, 'TYPE', 'OType');">
                    <label for="T4" class="form__radio__lable">Conference</label><br>
                </div>
                <div>
                    <input type="radio" name="Type" id="T5" value="Symposium" required class="form__radio" onclick="handleRadio(this, 'TYPE', 'OType');">
                    <label for="T5" class="form__radio__lable">Symposium</label><br>
                </div>
                <div style="display: inline-block;">
                    <input type="radio" name="Type" id="T6" value="Other" required class="form__radio" onclick="handleRadio(this, 'TYPE', 'OType');">
                    <label for="T6" class="form__radio__lable">Other:</label>
                    <input type="text" class="form__radio__input" id="OType" name="OType">
                </div>
                <br> <label class="form__error"> Select/Enter a valid type </label>
            </div>

            <div class="form__item" id="ISONLINE">
                <label class="form__label">Mode of the event <span class = "req"> * </span> </label>
                <div>
                    <input type="radio" name="isOnline" id="O1" value="Offline" required class="form__radio">
                    <label for="O1" class="form__radio__lable">Offline</label>
                </div>
                <div>
                    <input type="radio" name="isOnline" id="O2" value="Online" required class="form__radio">
                    <label for="O2" class="form__radio__lable">Online</label>
                </div>
                <div>
                    <input type="radio" name="isOnline" id="O3" value="Hybrid" required class="form__radio">
                    <label for="O3" class="form__radio__lable">Hybrid</label>
                </div>
            </div>

            <div class="form__item" id="ACADEMICYEAR">
                <label class="form__label">Academic Session <span class = "req"> * </span> </label> <br>
                <div>
                    <input type="radio" name="academicyear" id="A1" value="2016-2017" required class="form__radio">
                    <label for="A1" class="form__radio__lable">2016-2017</label>
                </div>
                <div>
                    <input type="radio" name="academicyear" id="A2" value="2017-2018" required class="form__radio">
                    <label for="A2" class="form__radio__lable">2017-2018</label>
                </div>
                <div>
                    <input type="radio" name="academicyear" id="A3" value="2018-2019" required class="form__radio">
                    <label for="A3" class="form__radio__lable">2018-2019</label>
                </div>
                <div>
                    <input type="radio" name="academicyear" id="A4" value="2019-2020" required class="form__radio">
                    <label for="A4" class="form__radio__lable">2019-2020</label>
                </div>
                <div>
                    <input type="radio" name="academicyear" id="A5" value="2020-2021" required class="form__radio">
                    <label for="A5" class="form__radio__lable">2020-2021</label>
                </div>
                <div style="display: inline-block;">
                    <input type="radio" name="academicyear" id="A6" value="2021-2022" required class="form__radio">
                    <label for="A6" class="form__radio__lable">2021-2022</label>
                </div>
            </div>

            <div class="form__item" id="DATETIME">
                <label for="Datetime" class="form__label"> Date & Time of event: <span class = "req"> * </span> </label>
                <input type="datetime-local" name="Datetime" id="Datetime" class="form__input" required>
                <label for="Datetime" class="form__error"> Enter a valid date </label>
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

            <div class="form__item" id="FILE">
                <label for="Host" class="form__label"> Poster: <span class = "req"> * </span> </label>
                <input type="file" class="file__in form__input" name="File" id="File" placeholder="Click here to choose file" required>
                <label for="File" class="form__error"> Enter Valid Image(.png, .jpg, .jpeg, .bmp) or PDF file </label>
            </div>

            <div class="form__item" id="ABOUT">
                <label for="About" class="form__label"> Write About The Event(50 words minimum)<span class = "req"> * </span> </label>
                <h4 id="About_Limit">Words Left: 100</h4>
                <textarea name="About" id="About" cols="30" rows="5" class="form__input" required></textarea>
                <label for="About" class="form__error"> Word count should be greater then 50 and less then 100 </label>
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