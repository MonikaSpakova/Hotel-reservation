<?php
session_start();

// include autoloader
require_once 'dompdf/autoload.inc.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();

include_once('spojenie.php');

/*$Num_rez = $_POST['Num_rez']; /* cislo rezervacie 

$sql = "SELECT * FROM rezervacia 
        LEFT JOIN izby ON rezervacia.id_izby=izby.id_izby 
        LEFT JOIN obce ON rezervacia.id_obce=obce.id_obce 
        LEFT JOIN okres ON obce.id_okres=okres.id_okresu 
        LEFT JOIN kraj ON obce.id_kraj=kraj.id_kraja 
        WHERE rezervacia.id_rezervacie=$Num_rez";
$result = mysqli_query($conn, $sql);
$vysledky = mysqli_fetch_assoc($result);

$origin = new DateTime($vysledky['Prichod']);
$target = new DateTime($vysledky['Odchod']);
$interval = $origin->diff($target);
$dlzka = $interval->format('%a');

$MenoP = $vysledky['Meno'] . ' ' . $vysledky['Priezvisko'];
$Email = $vysledky['Email'];
$Adresa1 = $vysledky['Ulica'] . ' ' . $vysledky['Cislo_domu'];
$Adresa2 = $vysledky['obec'] . ' ' . $vysledky['PSC'];
$Adresa3 = $vysledky['okres'] . ',' . $vysledky['kraj'];
$Izba = $vysledky['Cislo_izby'] . ' (' . $vysledky['Poschodie'] . '. poschodie )';
$Datum = $vysledky['Prichod'] . ' - ' . $vysledky['Odchod'];
$Osoby = $vysledky['Pocet_osob'];
$Cena = $dlzka*$vysledky['Cena_izby'] . ' €';*/
$MenoP = $_SESSION['MenoP'];
$Email = $_SESSION['Email'];
$Adresa1 = $_SESSION['Adresa1'];
$Adresa2 = $_SESSION['Adresa2'];
$Adresa3 = $_SESSION['Adresa3'];
$Izba = $_SESSION['Izba'];
$Datum = $_SESSION['Datum'];
$Osoby = $_SESSION['Osoby'];
$Cena = $_SESSION['Cena'];

$text = "
<style>
* {font-family: DejaVu Sans;}
td, th {padding: 2px 10px;}
th {background: #FFD8FF}
</style>

<h1>Faktúra rezervácie Hotel Magnólia</h1>
<table>
<tr>
    <th>Meno a Priezvisko</th>
    <td>$MenoP</td>
</tr>
<tr>
    <th>Email</th>
    <td>$Email</td>
</tr>
<tr>
    <th>Adresa</th>
    <td>$Adresa1</td>
</tr>
<tr>
    <th></th>
    <td>$Adresa2</td>
</tr>
<tr>
    <th></th>
    <td>$Adresa3</td>
</tr>
<tr>
    <th>Číslo izby</th>
    <td>$Izba</td>
</tr>
<tr>
    <th>Dátum pobytu</th>
    <td>$Datum</td>
</tr>
<tr>
    <th>Počet osôb</th>
    <td>$Osoby</td>
</tr>
<tr>
    <th>Cena za pobyt</th>
    <td>$Cena</td>
</tr>
</table>
";


$dompdf->loadHtml($text);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait'); // portrait/landscape

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('faktura.pdf');
