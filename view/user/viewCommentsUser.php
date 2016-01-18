<!DOCTYPE html>
<html>
	<?php include_once('inc/head.php');?>
	
	<body>
		<?php include_once('inc/barraMenuUser.php');?>
	
		<div class="contenuto"> 
			<?php

				$query = $this->modelUser->viewCommentsUser(); // Richiamo la viewComments
				
			?>
		</div>
	
	</body>
	<?php include_once('inc/footer.php');?>
</html>
