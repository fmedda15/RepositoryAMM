<!DOCTYPE html>
<html>
	<?php include_once('inc/head.php');?>
	
	<body>
		<?php include_once('inc/barraMenuAmm.php');?>
	
		<div class="contenuto">
			<p> Insert New Actor<br><br> </p>
			<form id="login" action="index.php?page=addNewActor" method="POST">
				<input type="text" name="id" id="text" value="id" required="required" onclick="this.value='';"><br>
				<input type="text" name="nome" id="text" value="Name" required="required" onclick="this.value='';"><br>
				<input type="text" name="cognome" id="text" value="Prename" required="required" onclick="this.value='';"><br>
				<textarea name="film" rows="5" cols="40" onclick="this.value='';">Films</textarea><br>
				<textarea name="vita" rows="5" cols="40" onclick="this.value='';"> Life</textarea><br>
				<button id="bottom" name="add">Add</button>
			</form> 
		</div>
	
	</body>
</html>
