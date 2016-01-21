<!DOCTYPE html>
<html>
	<?php include_once('inc/head.php');?>
	
	<body>
		<?php include_once('inc/barraMenuUser.php');?>
	
		<div class="contenuto"> 
			<p> Profile <br><br> </p>
			<?php
				$user = $_SESSION["idLoggedUser"];
				$query = $this->modelUser->viewProfile($user); //richiamo 
				
			?>
		</div>
	
	</body>
</html>
