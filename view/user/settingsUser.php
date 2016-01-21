<!DOCTYPE html>

<html>
	<?php include_once('inc/head.php');?>
	
	<body>
		<?php include_once('inc/barraMenuUser.php');?>
	
		<div class="contenuto">
			- <p> Settings <br><br></p>
				<form id="setting" action="index.php?page=settingUser" method="POST">
					<input type="text" name="newNome" id="textLogin" value="Insert a new User" required="required"  onclick="this.value='';"><br><br>
					<input type="text" name="newPassword" id="textLogin" value="Insert a new Password" required="required"  onclick="this.value='';">
					<br><br><button id="bottomLogin">Change</button>
				</form> 
		
		</div>
	</body>
</html>
