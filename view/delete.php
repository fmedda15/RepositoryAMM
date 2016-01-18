<!DOCTYPE html>
<html>
	<?php include_once('inc/head.php');?>
	
	<body>
		<?php include_once('inc/barraMenuAmm.php');?>
	
		<div class="contenuto">
			<p> Delete Account <br><br></p>
			<form id="login" action="index.php?page=deleteAccount" method="POST"><br><br><br>
				<input type="text" name="nick" id="text" value="Nickname" required="required" onclick="this.value='';"> <!-- nome text = nick -->
				<br><button id="bottom">Delete</button>
			</form> 
		</div>
	</body>
	<?php include_once('inc/footer.php');?>
</html>
