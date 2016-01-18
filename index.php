<?php

	/*Index del sito*/

	include_once("controller/controller.php"); //Includo il codice del Controller

	$controller = new Controller(); //Istanzio un oggetto della classe Controller
	
	if(isset($_REQUEST['page'])){ //è settato?
		
		$page = $_REQUEST['page']; //con href = (href = "index.php?page=valore")
	
	}
	else
		$page = "";  //in caso non sia settato es. prima apertura sito
	
/*
richiamo il metodo invoke del Controller. Questo permetterà di avere un unico punto di accesso al sito, aprirà le viste a seconda del valore di $page
*/
	session_start(); //inizio la sessione
	$controller->invoke($page); 
	
