<!DOCTYPE html>

<html>
	<?php include_once('inc/head.php');?>
	
	<body>
		<?php include_once('inc/barraMenuDefault.php');?>
		
		<!-- Form per segnalare problemi -->
		<div class="contenuto">
			<p> Reports Problems<br><br> </p>
			<form id="login" action="index.php?page=sendProblems" method="POST">
				<textarea name="problems" id="problems" rows="8" cols="100" required="required"  onclick="this.value='';"></textarea><br><br>
				<br><button id="bottom">Send</button>
			</form> 
		</div>
	<br>
	</body>
	<?php include_once('inc/footer.php');?>
</html>
