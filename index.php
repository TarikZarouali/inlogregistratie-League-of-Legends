<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,300&family=Space+Mono&display=swap"
        rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <link rel="stylesheet" href="./css/style.css">
    <!-- Dit is een icon link -->
    <link rel="shortcut icon" href="./img/favicon (1).ico" type="image/x-icon">


    <title>League of Legends</title>
</head>

<body style="font-family: 'Roboto', sans-serif;
               font-family: 'Space Mono', monospace;
               font-size: 1rem;">

    <main>


        <div class="container-fluid px-0">
            <div class="row">
                <div class="col-12">
                    <?php include("./navbar.php"); ?>

                </div>
            </div>
        </div>

        <div class="container-fluid px-0">
            <div class="row">
                <div class="col-12 ">
                    <?php include("./banner.php"); ?>
                </div>
            </div>
        </div>

        <div class="container-fluid px-0">
            <div class="row">
                <div class="col-12 ">
                    <?php  include("./content.php");?>


                </div>
            </div>
        </div>

        <div class="container-fluid px-0 fixed-bottom">
            <div class="row">
                <div class="col-12 ">
                    <?php include("./footer.php"); ?>
                </div>
            </div>
        </div>

        <!-- navbar -->


    </main>

    <!-- 6.2 0.0 seconden -->


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>


</body>

</html>