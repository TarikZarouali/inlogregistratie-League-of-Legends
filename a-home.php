a-home
<?php
var_dump($_SESSION);

echo session_id();
echo "<hr>";


echo "mijn gebruikersrol is : " . $_SESSION["userrol"];
echo "<hr>";
echo "mijn id is : " . $_SESSION["id"];
?>