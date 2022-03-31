<?php 

if (empty($_POST["email"])) {
    header("Location: ./index.php?content=message&alert=no-email");
} else {
    include("./connect_db.php");
    include("./functions.php");

    $email = sanitize($_POST["email"]);

    $sql = "SELECT * FROM `registreer` WHERE `Email` = '$email'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result)) {
        header("Location: ./index.php?content=message&alert=emailexists");
    } else {
        
        $array = mk_password_hash_from_microtime();

       $sql = "INSERT INTO `registreer` (`id`,
                                        `Email`,
                                        `password`,
                                        `userrol`,
                                        `activated`)
                VALUES                 (NULL,
                                        '$email',
                                        '{$array ["password_hash"]}',
                                        'customer',
                                        0)";
         //echo $sql;
         //exit();
        if (mysqli_query($conn, $sql)) {

            $id = mysqli_insert_id($conn); 
            $to = $email;
            $subject = "goed gedaan jij bent nu een virgin";
            $message = '<!doctype html>
            <html lang="en">
              <head>
                <!-- Required meta tags -->
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
            
                <!-- Bootstrap CSS -->
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
                <style>
                body{
                    background-color:#dddddd;
                    font-size: 1.3rem;
                </style>
            
                <title>Hello, world!</title>
              </head>
              <body>
                <h2>' . $array["date"] . '-'. $array["time"] .'</h2>
                <h3> jij bent nu eigenlijk wel een virgin maar maakt niet uit</h3>
                <p> klik <a href="http://backend-periode3/index.php?content=activate&id='. $id .' & pwh= ' . $array["password_hash"] .'">hier</a> om je account wachtwoord te veranderen</p>
                
            
                <!-- Optional JavaScript; choose one of the two! -->
            
                <!-- Option 1: Bootstrap Bundle with Popper -->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

              </body>
            </html>';

            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html; charset=UTF -8\r\n";
            $headers .= "From: admin@backend-periode3\r\n";
            $headers .= "CC: moderator@backend-periode3\r\n";
            $headers .= "Bcc: root@backend-periode3"; 

            mail($to, $subject, $message, $headers);    
             
            header("Location: ./index.php?content=message&alert=registreer-success");
        } else {
            header("Location: ./index.php?content=message&alert=registreer-error");
        }
    }
}
?>