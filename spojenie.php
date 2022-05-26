<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel";

// Vytvorenie spojenia
$conn = mysqli_connect($servername, $username, $password, $dbname);

// var_dump($conn);

// Kontrola spojenia
if (!$conn)
  die("Connection failed: " . mysqli_connect_error());

// Nastavenie spravnej kodovej sady pre citanie a zapis do DB
mysqli_query($conn, 'SET CHARACTER SET utf8');
mysqli_query($conn, 'SET NAMES "utf8"');
mb_internal_encoding('UTF-8');

?>
