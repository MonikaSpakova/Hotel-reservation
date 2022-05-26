<?php
include_once "index_top.php";

if (isset($_SESSION['role']) != 'admin') 
    header("Location: index.php");
?>

<?php
// Zobrazenie spravy o insert/update
if(isset($_GET['a']))
{
	if($_GET['a'] == 1)
        echo showBox('<strong>Údaj bol uložený!</strong>', 'success');
	elseif($_GET['a'] == 2)
		echo showBox('Údaj nebol uložený', 'danger');
	elseif($_GET['a'] == 3)
		echo showBox('Údaj nebol uložený/upravený - chýbajú údaje', 'danger');
}

// Udaje pre vyplnenie formulara
$cislo = '';
$poschodie = '';
$postele = '';
$cena = '';

?>

<div class="form_registr">
    <form action="registracia_save.php" method="post">
    <h1><i class="far fa-building"></i>Formulár prihlásenia izby do systému</h1>
    <div class="riadok_registr">
        <div class="pevne_registr">
            <label>Číslo izby:</label>
        </div>
        <div class="dopln_registr">
            <input type="number" id="Cislo_izby" name="Cislo_izby" min="0" max="99999" placeholder="Číslo hotelovej izby..." value="<?php echo $cislo; ?>" required><br><br>
        </div>
    </div>

    <div class="riadok_registr">
        <div class="pevne_registr">
            <label>Poschodie:</label>
        </div>
        <div class="dopln_registr">
            <input type="number" id="Poschodie" name="Poschodie" min="0" max="20" placeholder="Na ktorom poschodí je izba..." value="<?php echo $poschodie; ?>" required><br><br>
        </div>
    </div>

    <div class="riadok_registr">
        <div class="pevne_registr">
            <label>Počet postelí:</label>
        </div>
        <div class="dopln_registr">
            <input type="number" id="Kapacita" name="Kapacita" min="1" max="10" placeholder="Koľko postelí obsahuje..." value="<?php echo $postele; ?>" required><br><br>
        </div>
    </div>

    <div class="riadok_registr">
        <div class="pevne_registr">
            <label>Cena za izbu:</label>
        </div>
        <div class="dopln_registr">
            <input type="number" id="Cena_izby" name="Cena_izby" min="0.00" max="50000.00" placeholder="Cena izby na noc" value="<?php echo $cena; ?>" required><br><br>
        </div>

    </div>
    <div class="riadok_registr">
        <input type="submit" name="submit" value="Prihlásiť">
    </div>
    </form>

</div>

</body>
</html>