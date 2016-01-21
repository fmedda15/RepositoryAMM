<!DOCTYPE html>
<html>
	<?php include_once('inc/head.php');?>
	
	<body>
		<?php include_once('inc/barraMenuAmm.php');?>
	
		<div class="contenuto"> 
			<p> Comments <br><br></p>
			<?php

				$query = $this->modelAmm->viewComments(); //richiamo la viewComments() dal modelSession
				
			?>
		</div>
	
	</body>

</html>
