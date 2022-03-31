<?php 
session_start();
session_gc();

if(isset($_GET["content"])){
  $active = $_GET["content"];
}else {
  $active="";
}
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Op.wpgg</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?php if($active == "home"){ echo "active";} ?>" aria-current="page"
                        href="./index.php?content=home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($active == "streams"){ echo "active";} ?>"
                        href="./index.php?content=streams">Streams</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($active == "patchnotes"){ echo "active";} ?>"
                        href="./index.php?content=patchnotes">patch notes</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <?php
       if (isset($_SESSION["ID"])){
        switch ($_SESSION["userrol"]) {
            case 'admin':
                echo '  <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link';
                if ($active == "a-users") {
                    echo "active";
                }
                echo '" href="./index.php?content=a-users">users</a>
                      </li>
                      </ul>';
                // ---
                echo '  <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link';
                if ($active == "a-reset_password") {
                    echo "active";
                }
                echo '" href="./index.php?content=a-reset_password">reset password</a>
                 </li>
                     </ul>';
                break;
            case 'root':
                echo '  <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link';
                if ($active == "r-rootpage") {
                    echo "active";
                }
                echo '" href="./index.php?content=r-rootpage">r-rootpage</a>
                      </li>
                      </ul>';

                break;
            case 'moderator':
                echo '  <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link';
                if ($active == "m-moderator") {
                    echo "active";
                }
                echo '" href="./index.php?content=m-moderator">m-home</a>
                      </li>
                      </ul>';
                // ---
                break;
            case 'customer':
                echo '  
                <ul class="navbar-nav">
                    <li class="nav-item">
                         <a class="nav-link';
                if ($active == "c-customer") {
                    echo "active";
                }
                echo '" href="./index.php?content=c-customer">c-home</a>
                    </li>
                </ul>';
                break;
            default:
                break;
        }    
                echo '<li class="nav-item">
                <a class="nav-link';
                echo ($active == "uitloggen") ? "active" : "";
                echo '" href="./index.php?content=uitloggen">uitloggen</a>
                </li>';
            } else {
                echo '<li class="nav-item">
                        <a class="nav-link ';
                echo ($active == "registreer") ? "active" : "";
                echo '" href="./index.php?content=registreer">Registreren</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link  ';
                echo ($active == "inloggen") ? "active" : "";
                echo '" href="./index.php?content=inloggen">Inloggen</a>
                      </li>';
            }
      ?>
            </ul>

        </div>
    </div>
</nav>