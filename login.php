<?php
include_once "index_top.php";
?>

<form action="index.php" method="post" class="form-horizontal">
<div class="form-group">
    <div class="riadok">   
		<label for="login" class="pevne"><i class="fas fa-user"></i> Login</label>
		<div class="col-sm-6">
			<input type="text" class="vstup" id="login" name="login" required>
		</div>
	</div>
	<div class="riadok">
		<label for="heslo" class="pevne"><i class="fas fa-lock"></i> Heslo</label>
		<div class="col-sm-6">
			<input type="password" class="vstup" id="heslo" name="heslo" required>
		</div>
	</div>

	<div class="riadok">
		<div class="tlacidlo">
			<button type="submit" name="tlacidlo" class="btn btn-info" >Prihlásiť</button>
		</div>
	</div>
</div>
</form>



