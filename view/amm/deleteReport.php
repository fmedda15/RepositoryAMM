<!DOCTYPE html>

<html>
	<?php include_once('inc/head.php');?>
	
	<body>
		<?php include_once('inc/barraMenuDefault.php');?>
		
		<!-- Form per segnalare problemi -->
		<div class="contenuto">
			<p> Delete Reports<br><br> </p>
			<form id="report" action="index.php?page=deleteReportNow" method="POST">
				<br><input type="text" name="idReport" id="idReport" required="required"  onclick="this.value='';">
				<br><button id="bottom">Delete</button>
			</form> 
		</div>
	<br>
	</body>

</html>
