<?php
include_once 'spojenie.php';
include_once 'funkcie.php';

$Meno = checkDBInput($_POST['Meno']);
$Priezvisko = checkDBInput($_POST['Priezvisko']);
$E_mail = checkDBInput($_POST['Email']);
$Tel = $_POST['Telefon'];
$Telefon = (mb_strlen($Tel) == 0 ? $Tel = "NULL" : $Tel);
$Ulica = checkDBInput($_POST['Ulica']);
$Cislo_domu = checkDBInput($_POST['Cislo_domu']);
$ID_obce = $_POST['Mesto'];
$Prichod =  date('Y-m-d', strtotime($_POST['Prichod']));
$Odchod =  date('Y-m-d', strtotime($_POST['Odchod']));  
$ID_izby = $_POST['C_izby'];
$Pocet_osob = $_POST['Pocet_osob'];
$Time = date("Y-m-d H:i:s", strtotime("+1 hours"));

if($Prichod && $Odchod && $Meno && $Priezvisko && $E_mail && $Telefon && $Ulica
&& $Cislo_domu && $ID_izby && $ID_izby && $Pocet_osob) 
{
        $sql = "INSERT INTO rezervacia VALUES (NULL, '$ID_izby', '$Meno','$Priezvisko', 
        '$E_mail','$Telefon','$ID_obce', '$Ulica', '$Cislo_domu', '$Prichod', '$Odchod',  
        '$Pocet_osob', '$Time')";
        if (mysqli_query($conn, $sql)) {

            $show = 6;
            // echo "New record created successfully";
        }else {
            $show = 2;
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
}
else
    $show = 3;

header("location: rezervacia.php?a=$show");
?>
