<!DOCTYPE html>

<html>
	<?php include_once('inc/head.php');?>
	
	<body>
		<?php include_once('inc/barraMenuDefault.php');?>
		<div class="contenuto">
			<p> Login User <br><br></p>
			<!-- Form login -->
			<form class="login" action="index.php?page=loginNow" method="POST">
				<input type="text" name="nick" id="text" value="Nome" required="required" onclick="this.value='';"> <!-- nome text = nick -->
				<br><input type="password" name="password" id="text" value="password"  required="required" onclick="this.value='';"> <!-- nome text = password -->
				<br><button id="bottom">Login</button>
			</form> 
		
			<!-- Form registrazione nuovo utente-->
			<form class="login" action="index.php?page=registra" method="POST" >
				<br><button id="bottom">Sign in</button>
			</form> 
		
			<?php 
			if(isset($result) && $result != "logout")
				echo $result; //Stampa risultato
			?>
		</div>
		
	</body>
	<?php include_once('inc/footer.php');?>
</html>
