
<?php

    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

if (isset($_POST["submit"])) {
    $appAddress = $_POST['appAddress'];
    $lengthOfOcc = $_POST["lengthOfOcc"];
    $moveindate = $_POST['moveindate'];
    $name = $_POST["fname"] . " " . $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST["phone"];
    $lastadd = $_POST["lastadd"] . " " . $_POST['lastadd2'];
    $city = $_POST["city"];
    $state = $_POST['state'];
    $zipCode = $_POST["zipCode"];
    $monthRent = $_POST['monthRent'];
    $lastaddlen = $_POST["lastaddlen"];
    $employmentstat = $_POST['employmentstat'];
    $company = $_POST["company"];
    $grossinc = $_POST['grossinc'];
    $pets = $_POST["pets"];
    $petsdescrip = $_POST['petsdescrip'];
    $onlyoccupant = $_POST["onlyoccupant"];
    $occupant2name = $_POST['occupant2fname']  . " " . $_POST["occupant2lname"];
    $occupant2relation = $_POST['occupant2relation'];
    $occupant3name = $_POST["occupant3fname"]  . " " . $_POST['occupant3lname'];
    $occupant3relation = $_POST["occupant3relation"];
    $haveSSN = $_POST['haveSSN'];
    $SSN = $_POST["SSN"];
    $dob = $_POST['dob'];
    $haveEviction = $_POST["haveEviction"];
    $eviction = $_POST['eviction'];
    $haveFelony = $_POST["haveFelony"];
    $felony = $_POST['felony'];
    $comments = $_POST["comment"];


    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    // postApp($conn, $appAddress, $lengthOfOcc, $moveindate, $name, $email, $phone, $lastadd, 
    // $city, $state, $zipCode, $monthRent, $lastaddlen, $employmentstat, $company, $grossinc,  
    // $pets, $petsdescrip, $onlyoccupant, $occupant2name, $occupant2relation, $occupant3name, $occupant3relation, $haveSSN, 
    // $SSN, $dob, $haveEviction, $eviction, $haveFelony, $felony, $comments);




    //Load Composer's autoloader
    // require 'vendor/autoload.php';

    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    require 'PHPMailer/src/Exception.php';

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = false;                      //Enable verbose debug output    SMTP::DEBUG_SERVER
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.titan.email';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'applications@coolbreezetexas.com';                     //SMTP username
        $mail->Password   = 'mVnJtaDi7ysxYDj';                               //SMTP password  

        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('applications@coolbreezetexas.com', 'CoolBreezeTexas Applications');
        $mail->addAddress('ryansoto361@hotmail.com', 'applications');     //Add a recipient
        // $mail->addAddress('applications@coolbreezetexas.com');               //Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'New Application Submission';

        $htmlBody = file_get_contents('../applicationEmail.html');
        $htmlBody = str_replace('$appAddress', $appAddress, $htmlBody);
        $htmlBody = str_replace('$lengthOfOcc', $lengthOfOcc, $htmlBody);
        $htmlBody = str_replace('$moveindate', $moveindate, $htmlBody);
        $htmlBody = str_replace('$name', $name, $htmlBody);
        $htmlBody = str_replace('$email', $email, $htmlBody);
        $htmlBody = str_replace('$phone', $phone, $htmlBody);
        $htmlBody = str_replace('$lastadd ', $lastadd, $htmlBody);
        $htmlBody = str_replace('$city', $city, $htmlBody);
        $htmlBody = str_replace('$state', $state, $htmlBody);
        $htmlBody = str_replace('$zipCode', $zipCode, $htmlBody);
        $htmlBody = str_replace('$monthRent', $monthRent, $htmlBody);
        $htmlBody = str_replace('$lastaddlen', $lastaddlen, $htmlBody);
        $htmlBody = str_replace('$employmentstat', $employmentstat, $htmlBody);
        $htmlBody = str_replace('$company', $company, $htmlBody);
        $htmlBody = str_replace('$grossinc', $grossinc, $htmlBody);
        $htmlBody = str_replace('$pets ', $pets, $htmlBody);
        $htmlBody = str_replace('$petsdescrip', $petsdescrip, $htmlBody);
        $htmlBody = str_replace('$onlyoccupant', $onlyoccupant, $htmlBody);
        $htmlBody = str_replace('$occupant2name', $occupant2name, $htmlBody);
        $htmlBody = str_replace('$occupant2relation', $occupant2relation, $htmlBody);
        $htmlBody = str_replace('$occupant3name', $occupant3name, $htmlBody);
        $htmlBody = str_replace('$occupant3relation', $occupant3relation, $htmlBody);
        $htmlBody = str_replace('$haveSSN', $haveSSN, $htmlBody);
        $htmlBody = str_replace('$SSN', $SSN, $htmlBody);
        $htmlBody = str_replace('$dob', $dob, $htmlBody);
        $htmlBody = str_replace('$haveEviction', $haveEviction, $htmlBody);
        $htmlBody = str_replace('$eviction', $eviction, $htmlBody);
        $htmlBody = str_replace('$haveFelony', $haveFelony, $htmlBody);
        $htmlBody = str_replace('$felony', $felony, $htmlBody);
        $htmlBody = str_replace('$comments', $comments, $htmlBody);
        

        $mail->Body    =  $htmlBody;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->send();

        echo "<script>window.location.assign('../index.php?success=appsent')</script>";

        // header("location: ../index.php?success=appsent");
        // exit();

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

}   else {
    header("location: ../application.php");
    exit();
}