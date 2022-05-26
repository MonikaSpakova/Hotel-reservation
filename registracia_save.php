<?php
include_once 'spojenie.php';
include_once 'funkcie.php';

$Cislo_izby = intval($_POST['Cislo_izby']);
$Poschodie = intval($_POST['Poschodie']);
$postele = intval($_POST['Kapacita']);
$Cena_izby = floatval($_POST['Cena_izby']);

if((!isset($_POST['Cislo_izby'])) || (!isset($_POST['Poschodie'])) || 
(!isset($_POST['postele'])) || (!isset($_POST['Cena_izby']))) 
{
        $sql = "INSERT INTO izby VALUES (NULL, '$Cislo_izby', '$Poschodie','$postele', '$Cena_izby')";
        //$result = mysqli_query($conn, $sql);
        // var_dump($result);
        if (mysqli_query($conn, $sql)) {

            $show = 1;
            // echo "New record created successfully";
        }else {
            $show = 2;
            // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
}
else
    $show = 3;

header("location: registracia.php?a=$show");