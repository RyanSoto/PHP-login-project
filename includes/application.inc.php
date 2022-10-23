
<?php


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

    postApp($conn, $appAddress, $lengthOfOcc, $moveindate, $name, $email, $phone, $lastadd, 
    $city, $state, $zipCode, $monthRent, $lastaddlen, $employmentstat, $company, $grossinc,  
    $pets, $petsdescrip, $onlyoccupant, $occupant2name, $occupant2relation, $occupant3name, $occupant3relation, $haveSSN, 
    $SSN, $dob, $haveEviction, $eviction, $haveFelony, $felony, $comments);

}   else {
    header("location: ../application.php");
    exit();
}