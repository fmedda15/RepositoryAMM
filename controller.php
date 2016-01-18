<?php

	/*Controller*/

	include_once("model/modelSession.php"); //includo il codice del ModelSession contenente le funzioni per la gestione del login
	include_once("model/modelAmm.php"); //includo il codice del ModelAmm per la gestione delle funzioni dell'amministratore
	include_once("model/modelUser.php"); //includo il codice del ModelUser per la gestione delle funzioni dell'utente

	class Controller{

		//variabili istanzaclass Settings{

		public $modelSession; //login&logout
		public $modelAmm; //funzioni amministratore
		public $modelUser; //funzioni utente
		
		//costruttore

		public function __construct(){
	  
			$this->modelSession = new ModelSession();
			$this->modelAmm = new ModelAmm();
			$this->modelUser = new ModelUser();
		}

		/*Permette l'apertura delle viste a seconda del valore di $page. In questo modo si ha un unico punto d'accesso nel sito*/

		public function invoke($page){

			//gestione del login
			//primo apertura del sito
			if($page == "home" || $page == "" || $page == "homeDefault"){
				
				include "view/default/homeDefault.php";
			}
			
			//Altri casi possibili nella homeDefault (utente generico non registrato)
			else{	
				if($page == "problems") /* segnalare dei problemi*/
					
					include "view/default/problems.php";

				if($page == "actors"){ /* visualizza attori presenti nel DB */
					
					include "view/default/actorsDefault.php";
				}
				
				if($page == "comments"){ /* visualizza commenti presenti nel DB */
					
					include "view/default/comments.php";
				}
				
				if($page == "login"){  /* login utente registrato */
					
					include "view/default/login.php";
				}
				
				if($page == "signIn"){ /* nuovo utente */
					
					include "view/default/signIn.php";
				}
							
				
				else{
					//effettuare la registrazione del nuovo utente
					if($page == "signInNow"){ 
					
						//salvo i valori in delle variabili
						$nickname = $_REQUEST["nickname"];
						$password = $_REQUEST["password"];
						$name = $_REQUEST["nome"];
						$prename = $_REQUEST["cognome"];
						$email = $_REQUEST["email"];	

						$result = $this->modelSession->getRegister($nickname,$password,$name,$prename,$email); //richiamo la registrazione

						include "view/default/homeDefault.php";
					}						
					
					//Accesso da parte di un utente registrato
					if($page == "loginNow"){ 
						
						//salvo i dati di login		
						$user = $_REQUEST['nick'];
						$password = $_REQUEST['password'];

						$result = $this->modelSession->getLogin($user, $password); //richiamo la getLogin() dal model session
						
						//controllo se l'utente è effettivamente registrato nel DB
						if($result == false)
							
							$result = "Errore nel login. I dati inseriti sono errati";

						//login amministratore
						if($_SESSION["loggedAmm"] == true){ 
								
							include "view/amm/homeAmm.php";
												
						}
					else{
						//login Utente
						if($_SESSION["loggedUser"] == true){
	
							include "view/user/homeUser.php";

							}
						else  //in caso di errore nel login
						
						include "view/default/login.php";	
					}
						
					
				
					}
					if($page == "logout"){
						
						$result = $this->modelSession->getLogout(); //Sloggo richiamando la getLogout()
					
						include "view/default/homeDefault.php";

					}
				}
				
				/*Gestione in caso di login da parte dell'amministratore*/
				if(isset($_SESSION["loggedAmm"]) && $_SESSION["loggedAmm"] == true){
			
					if($page == "homeAmm") {
						
						include "view/amm/homeAmm.php";
					}

					if($page == "addActor"){
						//visualizzazione i tutti gli attori presenti nel DB
						include "view/amm/addActorsAmm.php";
					}
					
					if($page == "addNewActor"){
						//aggiunta di un nuovo attore nel DB
						//salvo i valori in delle variabili
						
						$id = $_REQUEST["id"];						
						$nome = $_REQUEST["nome"];
						$cognome = $_REQUEST["cognome"];
						$film = $_REQUEST["film"];
						$vita = $_REQUEST["vita"];	

						$result = $this->modelAmm->addActor($id,$nome,$cognome,$film,$vita); //richiamo l'aggiunta

						include "view/amm/homeAmm.php";
					}
					
					
					if($page == "deleteActor"){
						//Eliminazione attore dal DB
						include "view/amm/deleteActorAmm.php";
					}

					if($page == "deleteNowActor"){
					
						//salvo i valori in delle variabili
						$nome = $_REQUEST["nome"];
						$cognome = $_REQUEST["cognome"];

						$result = $this->modelAmm->deleteActor($nome,$cognome); //richiamo l'eliminazione

						include "view/amm/homeAmm.php";
					}
					
					if($page == "viewActor"){
					
						include "view/amm/actorsAmm.php";
					}
					
					if($page == "deleteUser"){
						//cancellazione utente dal DB
						include "view/amm/deleteUserAmm.php";

						}
						
					if($page == "deleteNowUser"){
						
						$nickname = $_REQUEST["nickname"];
						$result = $this->modelAmm->deleteUser($nickname); //richiamo l'eliminazione						

						include "view/amm/homeAmm.php";
					}

					if($page == "viewUser"){
						//visualizzazione di tutti gli utenti registrati nel DB
						include "view/amm/viewUsersAmm.php";

					}

					if($page == "addCommentAmm"){
						
						include "view/amm/addCommentAmm.php";

						}
					
					if($page == "addNowComment"){
						
						$id = $_REQUEST["id"];
						$testo = $_REQUEST["testo"];
						$result = $this->modelAmm->addComment($id,$testo); //richiamo l'aggiunta di un commento da parte dell'Amministratore						

						include "view/amm/homeAmm.php";
					}	

					if($page == "viewComments"){
						
						include "view/amm/viewCommentsAmm.php";

						}
					if($page == "deleteComment"){
						
						include "view/amm/deleteCommentAmm.php";

						}
					
					if($page == "deleteNowComment"){
						
						$id = $_REQUEST["id"];
						$result = $this->modelAmm->deleteComment($id); //richiamo l'eliminazione						

						include "view/amm/homeAmm.php";
					}	
					
					
					
				}//fine gestione della sessione amministratore

				else{
					/*Gestione in caso di login da parte dell'utente*/

					if(isset($_SESSION["loggedUser"]) && $_SESSION["loggedUser"] == true){

					if($page == "homeUser") {
					
						include "view/user/homeUser.php";

					}

					if($page == "viewActorsUser"){
						
						include "view/user/viewActorsUser.php";

					}

					if($page == "addCommentUser"){
			
						include "view/user/addCommentUser.php";
					
					}
					
					if($page == "addCommentNowUser"){
						
						$user = $_SESSION["idLoggedUser"];
						$testo = $_REQUEST["testo"];
						
						$result = $this->modelUser->addCommentUser($user,$testo);						

						include "view/user/homeUser.php";
					}
													
					if($page == "viewCommentsUser"){
						
						include "view/user/viewCommentsUser.php";
					
					}
					
					if($page == "profile"){					

						include "view/user/viewProfileUser.php";						

					}
							

					if($page == "settings"){
						
						include "view/user/changeProfile.php";
					
					}
					
					if($page == "change"){
						
						//salvo i valori in delle variabili
						$nickname = $_REQUEST["nickname"];
						$password = $_REQUEST["password"];
						$name = $_REQUEST["nome"];
						$prename = $_REQUEST["cognome"];
						$email = $_REQUEST["email"];	

						$result = $this->modelUser->makeSettings($nickname,$password,$name,$prename,$email); //richiamo la makeSettings

						include "view/user/viewProfileUser.php";
					
					}
					
					
						
				}//fine gestione utente
				}	

			}//fine else prima apertura		

		}//fine invoke
		
	}
?>
