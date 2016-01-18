<!DOCTYPE html>

<html>
	<?php include_once('inc/head.php');?>
	
	<body>
		<?php include_once('inc/barraMenuUser.php');?>

		<div class="contenuto">
		<p> User Settings<br><br> </p>
			<form id="login" action="index.php?page=change" method="POST">
				<input type="text" name="nickname" id="text" value="New NickName" required="required" onclick="this.value='';"><br>
				<input type="text" name="password" id="text" value="New Password" required="required" onclick="this.value='';"><br>
				<input type="text" name="nome" id="text" value="New Name" required="required" onclick="this.value='';"><br>
				<input type="text" name="cognome" id="text" value="New Prename" required="required" onclick="this.value='';"><br>
				<input type="text" name="email" id="text" value="New Email" required="required" onclick="this.value='';"><br>
				<button id="bottom" name="signIn">Change</button>
			</form> 
		</div>
		
		<br>
	</body>
	<?php include_once('inc/footer.php');?>
</html>
