<?php 
//13_02_19
//Recaptcha3

//http://94.177.203.98/recaptcha.php

// Check if form was submitted:
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recaptcha_response'])) {

    // Build POST request:
    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptcha_secret = '6LevM5EUAAAAAFM5G4Kw_Jk8OGTF-lKgfnyVOnlg';
    $recaptcha_response = $_POST['recaptcha_response'];

    // Make and decode POST request:
    $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
    $recaptcha = json_decode($recaptcha);
print_r($recaptcha);
    // Take action based on the score returned:
    if ($recaptcha->score >= 0.5) {
        // Verified - send email
    } else {
        // Not verified - show form error
    }

} ?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Google reCAPTCHA v3</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
    <script src="https://www.google.com/recaptcha/api.js?render=6LevM5EUAAAAAJe1dVvcDvJxjeqvHFpddJNzRX45"></script>
    <script>
        grecaptcha.ready(function () {
            grecaptcha.execute('6LevM5EUAAAAAJe1dVvcDvJxjeqvHFpddJNzRX45', { action: 'contact' }).then(function (token) {
                var recaptchaResponse = document.getElementById('recaptchaResponse');
                recaptchaResponse.value = token;
            });
        });
    </script>
</head>
<body>

    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-half">

                    <form method="POST">

                        <h1 class="title">
                            reCAPTCHA v3 example
                        </h1>

                        <div class="field">
                            <label class="label">Name</label>
                            <div class="control">
                                <input type="text" name="name" class="input" placeholder="Name" required>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Email</label>
                            <div class="control">
                                <input type="email" name="email" class="input" placeholder="Email Address" required>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Message</label>
                            <div class="control">
                                <textarea name="message" class="textarea" placeholder="Message" required></textarea>
                            </div>
                        </div>

                        <div class="field is-grouped">
                            <div class="control">
                                <button type="submit" class="button is-link">Send Message</button>
                            </div>
                        </div>

                        <input type="hidden" name="recaptcha_response" id="recaptchaResponse">

                    </form>

                </div>
            </div>
        </div>
    </section>

</body>

</html>
<?php
//Recaptcha2 
  if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response']))
  {
        $secret = '6LddNZEUAAAAAPfNKNqGwWVkMdRKEpst6Es6pahd';
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
		print_r($responseData);
        if($responseData->success)
        {
            $succMsg = 'Your contact request have submitted successfully.';
        }
        else
        {
            $errMsg = 'Robot verification failed, please try again.';
        }
   }
?>
<html>
<head>
<script src='https://www.google.com/recaptcha/api.js' async defer ></script>
</head>
<body>
<form action="" method="post">
<div class="g-recaptcha" data-sitekey="6LddNZEUAAAAAJsYP-WARcdjkEc2aeXsVTp0c24z"></div>
<input type="submit" value="submit">
</form>
</body>
</html>

