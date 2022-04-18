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
        <title>User Login</title>

        <!-- Style, JavaScript and Icon-->
        <link rel="stylesheet" href="CSS/EventForm.css">
    </head>

    <body>
        <form class="form" action="./Login.php" method="POST" id='form'>
            <!-- Head -->
            <div class = "form__item form__top"></div>
            <div class="form__item form__head">
                <h1 class="form__title">User Login</h1>

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
            <div class="form__item" id="USERID">
                <label for="UserID" class="form__label"> UserID: <span class = "req"> * </span> </label>
                <input type="text" placeholder="Your Answer" name="UserID" id="UserID" class="form__input" required>
            </div>

            <div class="form__item" id="PASSWORD">
                <label for="Password" class="form__label"> Password: <span class = "req"> * </span> </label>
                <input type="password" placeholder="Your Answer" name="Password" id="Password" class="form__input" required>
            </div>

            <!-- Submit and Reset -->
            <div class="form__end">
                <button type="submit" class="form__btn submit">Submit</button>
                <button type="reset" class="form__btn reset">Clear Response</button>
                <span class="EndText"> <b>Deshbandhu</b> College </span>
            </div>
        </form>
    </body>
</html>

<?php exit(); ?>