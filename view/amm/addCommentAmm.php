<!DOCTYPE html>
<html>
	<?php include_once('inc/head.php');?>
	
	<body>
		<?php include_once('inc/barraMenuAmm.php');?>
	
		<div class="contenuto">
			<p> Insert New Comment <br><br></p>
				<form id="login" action="index.php?page=addNowComment" method="POST">
					<input type="text" name="id" id="text" value="id" required="required" onclick="this.value='';"><br>
					<textarea name="testo" rows="5" cols="40" onclick="this.value='';">Films</textarea><br>
					<button id="bottom" name="add">Add</button>
				</form> 
		</div>
	
	</body>
</html>
