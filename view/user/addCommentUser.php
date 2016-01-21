<!DOCTYPE html>
<html>
	<?php include_once('inc/head.php');?>
	
	<body>
		<?php include_once('inc/barraMenuUser.php');?>
	
		<div class="contenuto">
			<p> Insert New Comment<br><br></p>
				<form id="login" action="index.php?page=addCommentNowUser" method="POST">
					<textarea name="testo" rows="5" cols="40" onclick="this.value='';">Insert your comment</textarea><br>
					<button id="bottom" name="add">Add</button>
				</form> 
		</div>
	
	</body>
</html>
