<!DOCTYPE html>

<html>
	<?php include_once('inc/head.php');?>
	
	<body>
		<!-- sigla -->
		<?php include_once('inc/barraMenuDefault.php');?>

		<!-- Form registrazione  -->
		<div class="contenuto">
			<p>User registration<br><br> </p>
			<form id="login" action="index.php?page=signInNow" method="POST">
				<input type="text" name="nickname" id="text" value="Chose a NickName" required="required" onclick="this.value='';"><br>
				<input type="text" name="password" id="text" value="Chose a Password" required="required" onclick="this.value='';"><br>
				<input type="text" name="nome" id="text" value="Name" required="required" onclick="this.value='';"><br>
				<input type="text" name="cognome" id="text" value="Prename" required="required" onclick="this.value='';"><br>
				<input type="text" name="email" id="text" value="Email" required="required" onclick="this.value='';"><br>
				<button id="bottom" name="signIn">Sign In</button>
			</form> 
		</div>
		
		<br>
	</body>
	<?php include_once('inc/footer.php');?>
</html>
