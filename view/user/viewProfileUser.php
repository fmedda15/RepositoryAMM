<!DOCTYPE html>
<html>
	<?php include_once('inc/head.php');?>
	
	<body>
		<?php include_once('inc/barraMenuUser.php');?>
	
		<div class="contenuto"> 
			<?php
				$user = $_SESSION["idLoggedUser"];
				$query = $this->modelUser->viewProfile($user); //richiamo 
				
			?>
		</div>
	
	</body>
	<?php include_once('inc/footer.php');?>
</html>
