<?php
include_once "index_top.php";
?>

<style type="text/css">
	
</style>
<?php
function kalendar($id) {
?>	
<table>
<?php
$date = getdate();

$mday = $date['mday'];
$mon = $date['mon'];
$wday = $date['wday'];           // 0 pre Nedelu, 6 Sobota
$month = $date['month'];
$year = $date['year'];


$dayCount = $wday;
$day = $mday;

while($day > 0) {
	if($dayCount == 0)
		$dayCount = 7;
	
	$days[$day--] = $dayCount--;
	if($dayCount < 0)             
		$dayCount = 7;
}

$dayCount = $wday;
$day = $mday;

if(checkdate($mon,31,$year))
	$lastDay = 31;
elseif(checkdate($mon,30,$year))
	$lastDay = 30;
elseif(checkdate($mon,29,$year))
	$lastDay = 29;
elseif(checkdate($mon,28,$year))
	$lastDay = 28;

while($day <= $lastDay) {
	$days[$day++] = $dayCount++;
	//var_dump($dayCount);
	var_dump($days);
	if($dayCount == 0)
		$dayCount = 7;
	if($dayCount >= 7)
		$dayCount = 0;
}	


$startDay = 1;
$d = $days[1];
var_dump($d);
echo("<tr>");
while($startDay < $d) {
	echo("<td></td>");
	$startDay++;
}
$day_to_highlight = array(8, 9, 10, 11, 12, 22,23,24,25,26);
for ($d=1;$d<=$lastDay;$d++) {
	if (in_array( $d, $day_to_highlight))
		$bg = "bg-green";
	else
		$bg = "bg-white";
	// Highlights the current day	
	if($d == $mday)
		echo("<td class='bg-blue'><a href='#' title='Detail of day'>$d</a></td>");
	else 
		echo("<td class='$bg'><a href='#' title='Detail of day'>$d</a></td>");


	$startDay++;
	if($startDay >= 7 && $d < $lastDay){
		$startDay = 0;
		echo("</tr>");
		echo("<tr>");
	}
}
echo("</tr>");
}
?>
</table>
<?php


function __construct($year = '', $month = '') {

	$date = time();

	if (empty($year) OR empty($month)) {
		$year = date('Y', $date);
		$month = date('m', $date);
		$day = date('d', $date);
	}
	
	if (isset($_POST['M_s'])) {
		$month = $month + 1;
        $date = date_create();
        date_date_set($date, $year, $month, 1);
        $newk = __construct($year, $month);
        echo $newk;
        var_dump($newk);
	}
	function Mesiac_dopredu() {
		$year = $year + 1;
	} 
	$first_day = mktime(0, 0, 0, $month, 1, $year);
	$title = date('F', $first_day);
	$day_of_week = date('D', $first_day);

	 switch ($day_of_week) {
		case "Mon": $blank = 0;
			break;
		case "Tue": $blank = 1;
			break;
		case "Wed": $blank = 2;
			break;
		case "Thu": $blank = 3;
			break;
		case "Fri": $blank = 4;
			break;
		case "Sat": $blank = 5;
			break;
		case "Sun": $blank = 6;
			break;
	}

	$days_in_month = cal_days_in_month(0, $month, $year);

	echo '<table border=1 width=394 class="kalend">';

	echo '<tr>';
	echo '<th colspan=60><input type="submit" name="M_s" class="M_s" value="<" style="padding-right:7em;"></input> ' . $title . ' ' . $year . ' <a  href="#" onClick="Mesiac_dopredu();"><i class="fas fa-greater-than" style="padding-left:7em;"></i></a></th>';
	echo '</tr>';

	echo '<tr class="dni">';
	echo '<td width=62>Po</td>';
	echo '<td width=62>Ut</td>';
	echo '<td width=62>St</td>';
	echo '<td width=62>Št</td>';
	echo '<td width=62>Pi</td>';
	echo '<td width=62>So</td>';
	echo '<td width=62>Ne</td>';
	echo '</tr>';

	$day_count = 1;

	while ($blank > 0) {
		echo '<td></td>';
		$blank = $blank - 1;
		$day_count++;
	}

	$day_num = 1;

	while ($day_num <= $days_in_month) {

		echo '<td>' . $day_num . '</td>';
		$day_num++;
		$day_count++;

		if ($day_count > 7) {
			echo '</tr><tr>';
			$day_count = 1;
		}
	}

	while ($day_count > 1 && $day_count <= 7) {
		echo '<td> </td>';
		$day_count++;
	}

	echo '</tr>';

	echo '</table>';

	//$c = new Calendar(2014, 6);
}
$kal = __construct();
if (isset($_POST['M_s'])) {
    $month = $month + 1;
    $date = date_create();
    date_date_set($date, $year, $month, 1);
    $newk = __construct("", $month);
    echo $newk;
    var_dump($newk);
}
?>
