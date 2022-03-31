<?php
var_dump($_POST);
include("./connect_db.php");
include("./functions.php");

$email = sanitize($_POST["email"]);
$password = sanitize($_POST["password"]);

if (empty($email) || empty($password)) {
    // check of de loginformvelden zijn ingevuld
    header("location: ./index.php?content=message&alert=loginform-empty");
} else {

    $sql = "SELECT * FROM `registreer` WHERE `Email` = '$email'";

    $result = mysqli_query($conn, $sql);

    // var_dump((bool) mysqli_num_rows($result));

    if (!mysqli_num_rows($result)) {
        // E-mailadres onbekend
        header("location: ./index.php?content=message&alert=email-unknown");
    } else {

        $record = mysqli_fetch_assoc($result);

        // var_dump((bool) $record["activated"]);

        if (!$record["activated"]) {
            // not activated
            header("location: ./index.php?content=message&alert=not-activated&email=$email");
        } elseif (!password_verify($password, $record["password"])) {
            // no password match
            header("location: ./index.php?content=message&alert=no-pw-match&email=$email");
        } else {
            // password matched

        
            $_SESSION["ID"] = $record["ID"];
            $_SESSION["userrol"] = $record["userrol"];

            switch ($record["userrol"]) {
                case 'customer':
                    header("location: ./index.php?content=c-home");
                    break;
                case 'root':
                    header("location: ./index.php?content=r-home");
                    break;
                case 'admin':
                    header("location: ./index.php?content=a-home");
                    break;
                case 'moderator':
                    header("location: ./index.php?content=m-home");
                    break;
                default:
                    header("location: ./index.php?content=home");
                    break;
            }
        }
    } // E-mailadres onbekend

} // check of de loginformvelden zijn ingevuld