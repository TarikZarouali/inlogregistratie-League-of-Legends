<?php
    include("./connect_db.php");

    include("./functions.php");
    
    $id = sanitize($_POST["id"]);
    $pwh = sanitize($_POST["pwh"]);
    $password = sanitize($_POST["password"]);
    $passwordCheck = sanitize($_POST["passwordCheck"]);

if (empty($_POST["password"]) || empty($_POST["passwordCheck"])) {
    header("location: ./index.php?content=message&alert=password-empty&id=$id&pwh=$pwh");
} elseif(strcmp($password, $passwordCheck)) {
    header("location: ./index.php?content=message&alert=nomatch-password&id=$id&pwh=$pwh");
}else{
    $sql = "SELECT * FROM `registreer` WHERE `ID` = $id ";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result)){
        $record = mysqli_fetch_assoc($result);
        if ($record["activated"]){
            header("Location: ./index.php?content=message&alert=already-active");
        }else{

            if( !strcmp($record["password"], $pwh)){
                
                //1. Maak een passwordhash voor het nieuw gekozen wachtwoord
                $password_hash = password_hash($password, PASSWORD_BCRYPT);
                //2. ga het record updaten met het nieuw gekozen gehashte wachtwoord
                $sql = "UPDATE `registreer`
                        SET    `password` = '$password_hash',
                               `activated` = 1
                        WHERE  `ID` = $id
                        AND    `password` = '$pwh' ";
        
                if (mysqli_query($conn, $sql)) {
                    //succes
                    header( "Location: ./index.php?content=message&alert=update-succes" );
                }else{
                     //error
                    header( "Location: ./index.php?content=message&alert=update-error&id=$id&pwh=$pwh" );
                } 
                }else{
                header("location: ./index.php?content=message&alert=no-match-pwh");
            }
        }

        //3. geef de gebruiker feedback met een alert dat het updaten is gelukt of niet en stuur hem dan door naar de andere pagina
    }else{
        //foutmelding
        header("Location: ./index.php?content=message&alert=no-id-pwh-match");
    }

    
}