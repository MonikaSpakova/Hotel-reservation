<?php
include_once "index_top.php";
?>
<div><p class="Medzera"></p></div>
<table id="table" class="table" style="width:80%">
<thead>
	<tr>
		<th>Číslo izby</th>
		<th>Poschodie</th>
		<th>Počet postelí</th>
		<th>Cena za noc</th>
    </tr>
</thead>
<tbody>

<?php
$sql = "SELECT * FROM izby";
$result = mysqli_query($conn, $sql);

// var_dump($result);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
	echo '<td><a href="kalendar.php?drow=' . intval($row['Cislo_izby']) . '">' .  $row['Cislo_izby'] .  '</a></td>';
	echo '<td>' . $row['Poschodie'] . '</td>';
	echo '<td>' . $row['Kapacita'] . '</td>';
    echo '<td>' . $row['Cena_izby'] . ' €</td>';
	// echo '<td class="text-right">';
	// echo '<a href="?row=' . intval($row['Cislo_autora']) . '" class="btn btn-warning btn-sm">Edit</a> &nbsp; ';
	// echo '<a href="?drow=' . intval($row['Cislo_autora']) . '" class="btn btn-danger btn-sm">Delete</a>';
	// echo '</td>';
	echo '</tr>';
  }
} else {
  echo "0 results";
}
?>
</tbody>
</table>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script>
		$('.table').DataTable();
	</script>




<?php


?>
</body>
</html>