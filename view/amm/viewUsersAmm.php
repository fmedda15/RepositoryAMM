<!DOCTYPE html>
<html>
	<?php include_once('inc/head.php');?>
	
	<body>
		<?php include_once('inc/barraMenuAmm.php');?>
	
		<div class="contenuto"> 
			<p> Users <br><br> </p>
			<?php

				$query = $this->modelAmm->viewUsers(); //richiamo la getactors() dal modelSession
				
			?>
		</div>
	
	</body>

</html>
