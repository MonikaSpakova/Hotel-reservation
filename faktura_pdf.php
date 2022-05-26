<?php
include_once "index_top.php";
?>
<?php
$Num_rez = $_GET['num_rez']; /* cislo rezervacie */

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
$_SESSION['MenoP'] = $vysledky['Meno'] . ' ' . $vysledky['Priezvisko'];
$Email = $vysledky['Email'];
$_SESSION['Email'] = $vysledky['Email'];
$Adresa1 = $vysledky['Ulica'] . ' ' . $vysledky['Cislo_domu'];
$_SESSION['Adresa1'] = $vysledky['Ulica'] . ' ' . $vysledky['Cislo_domu'];
$Adresa2 = $vysledky['obec'] . ' ' . $vysledky['PSC'];
$_SESSION['Adresa2'] = $vysledky['obec'] . ' ' . $vysledky['PSC'];
$Adresa3 = $vysledky['okres'] . ',' . $vysledky['kraj'];
$_SESSION['Adresa3'] = $vysledky['okres'] . ',' . $vysledky['kraj'];
$Izba = $vysledky['Cislo_izby'] . ' (' . $vysledky['Poschodie'] . '. poschodie )';
$_SESSION['Izba'] = $vysledky['Cislo_izby'] . ' (' . $vysledky['Poschodie'] . '. poschodie )';
$Datum = $vysledky['Prichod'] . ' - ' . $vysledky['Odchod'];
$_SESSION['Datum'] =  $vysledky['Prichod'] . ' - ' . $vysledky['Odchod'];
$Osoby = $vysledky['Pocet_osob'];
$_SESSION['Osoby'] = $vysledky['Pocet_osob'];
$Cena = $dlzka*$vysledky['Cena_izby'] . ' €';
$_SESSION['Cena'] = $dlzka*$vysledky['Cena_izby'] . ' €';

?>
<div class="form_rezerv" >
    <h1>Faktúra - Vytvoriť <input type="button" onclick="window.location.href='faktura.php';" value="PDF" style="background-color: lightpink;"/>
    </h1>

    <div class="riadok_f">
        <div class="pevne_f">
            <label>Meno a Priezvisko</label>
        </div>  
        <div class="dopln_f">
            <p class="f_text"><?php echo $MenoP?></p>
        </div>       
    </div>

    <div class="riadok_f">
        <div class="pevne_f">
            <label>E-mail</label>
        </div>  
        <div class="dopln_f">
            <p class="f_text"><?php echo $Email?></p>
        </div>       
    </div>

    <div class="riadok_f">
        <div class="pevne_f">
            <label>Adresa</label>
        </div>  
        <div class="dopln_f">
            <p class="f_text"><?php echo $Adresa1?></p>
            <p class="f_text"><?php echo $Adresa2?></p>
            <p class="f_text"><?php echo $Adresa3?></p>
        </div>       
    </div>

    <div class="riadok_f">
        <div class="pevne_f">
            <label>Číslo izby</label>
        </div>  
        <div class="dopln_f">
            <p class="f_text"><?php echo $Izba?></p>
        </div>       
    </div>   
    
    <div class="riadok_f">
        <div class="pevne_f">
            <label>Dátum pobytu</label>
        </div>  
        <div class="dopln_f">
            <p class="f_text"><?php echo $Datum?></p>
        </div>       
    </div>  

    <div class="riadok_f">
        <div class="pevne_f">
            <label>Počet osôb</label>
        </div>  
        <div class="dopln_f">
            <p class="f_text"><?php echo $Osoby?></p>
        </div>       
    </div>   

    <div class="riadok_f">
        <div class="pevne_f">
            <label>Cena za pobyt</label>
        </div>  
        <div class="dopln_f">
            <p class="f_text"><?php echo $Cena?></p>
        </div>       
    </div>  
</div>