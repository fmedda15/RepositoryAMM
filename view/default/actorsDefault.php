<!DOCTYPE html>
<html>
	<?php include_once('inc/head.php');?>

	
	<body>
		<?php include_once('inc/barraMenuDefault.php');?>
	
		<div class="contenuto"> 
			<p> Actors <br><br> </p>
				<?php
				

				$query = $this->modelSession->getActors(); //richiamo la getactors() dal modelSession
	
				?>
				

		</div>
	
	</body>
</html>
