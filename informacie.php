<?php
include_once "index_top.php";

if (isset($_SESSION['role']) != 'admin') 
    header("Location: index.php");

$pocet_ob_izieb = 0;
$pocet = 0;
$pocet_mesiac = 0;

$sql = "SELECT COUNT(Cislo_izby) FROM izby";
$result = mysqli_query($conn, $sql);
$vysledky = mysqli_fetch_assoc($result);

$sql2 = "SELECT * FROM rezervacia JOIN izby ON rezervacia.id_izby = izby.id_izby";
$result2 = mysqli_query($conn, $sql2);
$vysledky2 = mysqli_fetch_assoc($result2);
?>

<div class="form_rezerv" >
    <h1><i class="fas fa-hotel"></i> Informácie o hoteli</h1>

    <div class="riadok_f">
        <div class="pevne_i">
            <label>Počet všetkých izieb: </label>
        </div>  
        <div class="dopln_i">
            <p class="i_text"><?php $pocet = $vysledky['COUNT(Cislo_izby)']; echo $pocet?></p>
        </div>       
    </div>

    <div class="riadok_f">
        <div class="pevne_i">
            <label>Počet obsadených izieb v aktuálnom dni: </label>
        </div>  
        <div class="dopln_i">
            <p class="i_text"><?php
                if (mysqli_num_rows($result2) > 0) {
                    while($row = mysqli_fetch_assoc($result2)) {
                        $rozsah = [];
                        $rozsah = dateRange( $row['Prichod'], $row['Odchod']);
                        //var_dump($rozsah);
                        foreach ($rozsah as $data){
                            //echo $data;
                            if ($data == date("Y-m-d")) 
                                $pocet_ob_izieb = $pocet_ob_izieb + 1;
                        }
                    $novy_den = date_create($row['Prichod']);
                    if (date_format($novy_den, 'm') == date('m'))
                        $pocet_mesiac = $pocet_mesiac + 1;
                    } 
                }
                echo $pocet_ob_izieb;?>
            </p>
        </div>       
    </div>

    <div class="riadok_f">
        <div class="pevne_i">
            <label>Percento obsadenosti hotela v aktuálnom dni: </label>
        </div>  
        <div class="dopln_i">
            <p class="i_text"><?php echo round($pocet_ob_izieb*100/$pocet, 2) . ' %';?></p>
        </div>       
    </div>

    <div class="riadok_f">
        <div class="pevne_i">
            <label>Percento obsadenosti hotela v aktuálnom mesiaci: </label>
        </div>  
        <div class="dopln_i" style="margin-bottom:4em;">
            <p class="i_text"><?php echo round($pocet_mesiac*100/$pocet, 2) . ' %';?></p>
        </div>       
    </div>   
    
</div>