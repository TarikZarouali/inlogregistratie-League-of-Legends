<?php
    if (ISSET($_GET["content"])){
                   include( "./" . $_GET["content"] . ".php");
                }else{
                  include("./home.php");
                }
                ?>