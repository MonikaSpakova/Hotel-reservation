<?php
include_once "index_top.php";
?>

<h1 style="margin-top:10em; font-weight: bold; font-size: 30px;">Odhlasenie zo systému</h1>

<?php
unset($_SESSION['role']);
header('location: index.php');

