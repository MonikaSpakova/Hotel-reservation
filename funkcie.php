<?php
// Funkcia na kontrolu pred pouzitim v SQL dotaze
function checkDBInput($in, $entities = 0)
{
	// $in - lubovolna vstupna hodnota
	// $entities:
	// 0/nic: odstrani HTML znacky,  
	// 1: nahradi HTML znacky za entity,
	// 2: validuje na integer,
	// 3: validuje na desatinne cislo
	global $conn;

	// Odstrani "prazdne znaky" pred a za 
	$in = trim($in);

	if($entities == 1)
		$in = htmlspecialchars($in);
	elseif($entities == 2)
		$in = intval($in);
	elseif($entities == 3)
		$in = (float) str_replace(',', '.', $in);
	else
		$in = strip_tags($in);

	return mysqli_real_escape_string($conn, $in);
}

// Funkcia na zobrazenie textoveho boxu
?>
<style type="text/css">
.alert {
	margin: 7em;
}
</style>

<?php
function showBox($text, $type = 'warning', $close = 1)
{
	$out = '<div class="alert alert-' . $type . ' alert-dismissible fade show ">' . PHP_EOL;
	if($close)
		$out .= '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true"></button>' . PHP_EOL;
	$out .= $text;
	$out .= '</div>' . PHP_EOL;
	
	return $out;
}

// Funkcia na vypis mena prihlaseneho uzivatela
function menoUser($id)
{
	global $conn;
	$sql = "SELECT Meno_citatela, Priezvisko_citatela FROM citatel WHERE Cislo_citatela = '$id'";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) > 0) 
	{
		$res = mysqli_fetch_assoc($result);
		return $res['Meno_citatela'] . ' ' . $res['Priezvisko_citatela'];
	}
	else
		return '';
}

// rozsah dni 
function dateRange( $first, $last, $step = '+1 day', $format = 'Y-m-d' ) {

	$dates = array();
	$current = strtotime( $first );
	$last = strtotime( $last );

	while( $current <= $last ) {

		$dates[] = date( $format, $current );
		$current = strtotime( $step, $current );
	}

	return $dates;
}
?>
