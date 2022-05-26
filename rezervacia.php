<?php
include_once "index_top.php";
?>

<?php
// Zobrazenie spravy o insert/update
if(isset($_GET['a']))
{
	if($_GET['a'] == 1)
        echo showBox('<strong>Údaj bol uložený!</strong>', 'success');
	elseif($_GET['a'] == 2)
		echo showBox('<strong>Údaj nebol uložený</strong>', 'danger');
	elseif($_GET['a'] == 3)
		echo showBox('<strong>Údaj nebol uložený/upravený - chýbajú údaje</strong>', 'danger');
    elseif($_GET['a'] == 4)
        echo showBox('<strong>Vlož správny formát dátumu!</strong>', 'danger');
    elseif($_GET['a'] == 5)
        echo showBox('<strong>Chyba pri rezervácii!</strong>', 'danger');
    elseif($_GET['a'] == 6)
        echo showBox('<strong>Úspešne vytvorená rezervácia!</strong>', 'success');
}
// Udaje pre vyplnenie formulara
$prichod = '';
$odchod = '';
$meno = '';
$priezvisko = '';
$email = '';
$mobil = '';
$ulica = '';
$c_domu = '';
$PSC = '';
$Mesto = '';
$C_izby = '';
$osoby = '';
?>

<div class="form_rezerv">
    <form action="rezervacia_save.php" method="post">
    <h1><i class="far fa-calendar-alt"></i>Formulár pre rezerváciu izby</h1>
        <div class="riadok_rezerv">
            <div class="pevne_rezerv">
                <label>Príchod</label>
            </div>
            <div class="dopln_rezerv">
                <input type="date" id="Prichod" name="Prichod" min="<?php echo date("Y-m-d"); ?>" value="<?php echo $prichod; ?>" required>
            </div>
        
            <div class="posun"></div>

            <div class="pevne_rezerv">
                <label>Odchod</label>
            </div>
            <div class="dopln_rezerv">
                <input type="date" id="Odchod" name="Odchod" min="<?php echo date("Y-m-d"); ?>" value="<?php echo $odchod; ?>" required>
            </div>
        </div>

        <div class="riadok_rezerv">
            <div class="pevne_rezerv">
                <label>Meno</label>
            </div>
            <div class="dopln_rezerv">
                <i class="fas fa-user"></i>
                <input type="text" id="Meno" name="Meno" placeholder="Krstné meno" value="<?php echo $meno; ?>" required>
            </div>
        
            <div class="posun"></div>

            <div class="pevne_rezerv">
                <label>Priezvisko</label>
            </div>
            <div class="dopln_rezerv">
                <i class="fas fa-user"></i>
                <input type="text" id="Priezvisko" name="Priezvisko" placeholder="Priezvisko" value="<?php echo $priezvisko; ?>" required>
            </div>
        </div>

        <div class="riadok_rezerv">
            <div class="pevne_rezerv">
                <label>Email</label>
            </div>
            <div class="dopln_rezerv">
                <i class="fas fa-envelope"></i>
                <input type="email" id="Email" name="Email" placeholder="Emailová adresa" value="<?php echo $email; ?>" required>
            </div>

            <div class="posun"></div>

            <div class="pevne_rezerv">
                <label>Mobil</label>
            </div>
            <div class="dopln_rezerv">
                <i class="fas fa-phone"></i>
                <input type="tel" id="Telefon" name="Telefon" placeholder="Telefónne číslo / nepovinné" value="<?php echo $mobil; ?>">
            </div>
        </div>

        <div class="riadok_rezerv">
            <div class="pevne_rezerv">
                <label>Ulica</label>
            </div>
            <div class="dopln_rezerv">
                <i class="fas fa-id-badge"></i>
                <input type="text" id="Ulica" name="Ulica" placeholder="Ulica" value="<?php echo $ulica; ?>" required>
            </div>
        
            <div class="posun"></div>

            <div class="pevne_rezerv">
                <label>Číslo domu</label>
            </div>
            <div class="dopln_rezerv">
                <i class="fas fa-id-badge"></i>
                <input type="text" id="Cislo_domu" name="Cislo_domu" placeholder="Číslo domu" value="<?php echo $c_domu; ?>" required>
            </div>
        </div>

        <div class="riadok_rezerv">
            <div class="pevne_rezerv mesto">
                <label>Mesto</label>
            </div>
            <div class="dopln_rezerv">
                <i class="fas fa-id-badge"></i>
                <select style="width:49em;" id="Mesto" name="Mesto" required>
                    <option value=""></option>
                    <?php
                    $sql = "SELECT * FROM obce ORDER BY obec";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while($row = mysqli_fetch_assoc($result)) 
                        {
	                    if($row['id_obce'] == $Mesto)
		                    echo '<option value="' . $row['id_obce'] . '" selected>';
	                    else 
		                    echo '<option value="' . $row['id_obce'] . '">';
	                    echo $row['obec'] . ' ' . $row['PSC'];
	                    echo '</option>' . PHP_EOL;
                        }       
                    } else {
                        echo "0 results";
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="riadok_rezerv">
            <div class="pevne_rezerv">
                <label>Číslo izby</label>
            </div>
            <div class="dopln_rezerv">
                <i class="fas fa-key"></i>
                <select id="C_izby" name="C_izby" required>
                    <option value=""></option>
                
                    <?php
                    $sql = "SELECT * FROM izby";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while($row = mysqli_fetch_assoc($result)) 
                        {
                          if($row['id_izby'] == $C_izby)
                              echo '<option value="' . $row['id_izby'] . '" selected>';
                          else 
                              echo '<option value="' . $row['id_izby'] . '">';
                          echo 'Č.' . $row['Cislo_izby'] . ' / ' . $row['Cena_izby'] . ' za noc';
                          echo '</option>' . PHP_EOL;
                        }
                      } else {
                        echo "0 results";
                      }
               // value="<?php echo $c_izby; 
                    ?>
                    </select>
            </div>
            <div class="posun"></div>
        
            <div class="pevne_rezerv">
                <label style="margin-left:0em;">Počet osôb</label>
            </div>
            <div class="dopln_rezerv">
                <i class="fas fa-user-friends"></i>
                <?php/*
                if (isset($C_izby)){
                    $sql = "SELECT Kapacita FROM izby WHERE id_izby = $C_izby";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);}*/?>
                <input type="number" id="Pocet_osob" name="Pocet_osob" min="0" max="" placeholder="Celkový počet osôb" value="<?php echo $osoby; ?>" required>
            </div>
        </div>

        <input type="submit" name="submit" value="Rezervuj">
        
    </form>
</div>
<?php

?>
</body>
</html>
