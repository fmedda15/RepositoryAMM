<!DOCTYPE html>
<html>
	<?php include_once('inc/head.php');?>
	
	<body>
		<?php include_once('inc/barraMenuAmm.php');?>
	
		<div class="contenuto"> 
			<p> Reports <br><br> </p>
				<?php

				$query = $this->modelAmm->getReports(); //richiamo la getReports()
				
				?>
				

		</div>
	
	</body>
</html>
