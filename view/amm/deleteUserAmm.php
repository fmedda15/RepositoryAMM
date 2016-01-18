<!DOCTYPE html>
<html>
	<?php include_once('inc/head.php');?>
	
	<body>
		<?php include_once('inc/barraMenuAmm.php');?>
	
		<div class="contenuto">
			</p> Delete an Actor<br><br> </p>
			<form id="login" action="index.php?page=deleteNowUser" method="POST">
				<input type="text" name="nickname" id="text" value="Nickname" required="required" onclick="this.value='';"><br>
				<button id="bottom" name="delete">Delete</button>
			</form> 
		</div>
	
	</body>
	<?php include_once('inc/footer.php');?>
</html>
