<!DOCTYPE html>
<html>
	<?php include_once('inc/head.php');?>
	
	<body>
		<?php include_once('inc/barraMenuAmm.php');?>
	
		<div class="contenuto"> 
			<p> View Actors <br><br> </p>
				<?php

				$query = $this->modelAmm->getActors(); //richiamo la getactors()
				
				?>
				

		</div>
	
	</body>
	<?php include_once('inc/footer.php');?>
</html>
