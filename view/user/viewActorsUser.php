<!DOCTYPE html>
<html>
	<?php include_once('inc/head.php');?>
	
	<body>
		<?php include_once('inc/barraMenuUser.php');?>
	
		<div class="contenuto"> 
			<?php

				$query = $this->modelUser->viewActorsUser(); //richiamo la viewComments() dal modelSession
				
			?>
		</div>
	
	</body>
	<?php include_once('inc/footer.php');?>
</html>
