<!DOCTYPE html>
<html>
	<?php include_once('inc/head.php');?>
	
	<body>
		<?php include_once('inc/barraMenuUser.php');?>
	
		<div class="contenuto"> 
			<p> Actors <br><br> </p>
	
			<?php

				$query = $this->modelUser->viewActorsUser(); //richiamo la viewComments() dal modelSession
				
			?>
		</div>
	
	</body>
</html>
