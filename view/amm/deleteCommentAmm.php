<!DOCTYPE html>
<html>
	<?php include_once('inc/head.php');?>
	
	<body>
		<?php include_once('inc/barraMenuAmm.php');?>
	
		<div class="contenuto">
			<p> Delete an Actor<br><br> </p>
			<form id="login" action="index.php?page=deleteNowComment" method="POST">
				<input type="text" name="id" id="id" value="Comment Id" required="required" onclick="this.value='';"><br>
				<button id="bottom" name="delete">Delete</button>
			</form> 
		</div>
	
	</body>
	<?php include_once('inc/footer.php');?>
</html>
