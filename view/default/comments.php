<!DOCTYPE html>
<html>
	<?php include_once('inc/head.php');?>
	
	<body>
		<?php include_once('inc/barraMenuDefault.php');?>
	
		<div class="contenuto"> 
			<p> Comments <br><br></p>
		
				<?php

				$query = $this->modelSession->getComments(); //richiamo la getactors() dal modelSession
				
				?>
				

		</div>
	
	</body>
</html>
