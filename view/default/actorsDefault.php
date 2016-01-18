<!DOCTYPE html>
<html>
	<?php include_once('inc/head.php');?>
	
	<body>
		<?php include_once('inc/barraMenuDefault.php');?>
	
		<div class="contenuto"> 
			<p> View Actors <br><br> </p>
				<?php

				$query = $this->modelSession->getActors(); //richiamo la getactors() dal modelSession
				
				?>
				

		</div>
	
	</body>
	<?php include_once('inc/footer.php');?>
</html>
