<!DOCTYPE html>
<html>
	<?php include_once('inc/head.php');?>
	
	<body>
		<?php include_once('inc/barraMenuAmm.php');?>
	
		<div class="contenuto">
			<p>Delete an Actor<br><br><p/>
			<form id="login" action="index.php?page=deleteNowActor" method="POST">
				<input type="text" name="nome" id="text" value="Name" required="required" onclick="this.value='';"><br>
				<input type="text" name="cognome" id="text" value="Prename" required="required" onclick="this.value='';"><br>
				<button id="bottom" name="signIn">Delete</button>
			</form> 
		</div>
	
	</body>
	<?php include_once('inc/footer.php');?>
</html>
