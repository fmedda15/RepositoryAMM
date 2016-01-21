
<?php
	/*Variabili di livello applicazione contenenti i parametri per l'accesso al database*/	

	class Settings{

		public static $db_host = 'localhost';
		public static $db_user = 'root';
		public static $db_password = 'davide';
		public static $db_name = 'AMM2015_ActorsDB';

	}

	/*Gestione della sessione con rispettive funzioni per Login e Logout*/

	class ModelSession{ 
		
		// Funzione che invia le segnalazioni al DB

		public function sendProblem($problem){
			
			$mysqli = new mysqli(); //Creazione dell'istanza 		
			$mysqli->connect(Settings::$db_host,Settings::$db_user,Settings::$db_password,Settings::$db_name); //connessione al db
	
			//verifico la presenza di errori di connessione al db
			if($mysqli->connect_errno != 0){
				
				//c'è un errore e lo gestisco
				$idErrore = $mysqli->connect_errno; //salvo l'id dell'errore
				$msg = $mysqli->connect_error; //salvo il messaggio dell'errore
				return "Errore connessione al db";
			}
			else{
				//connessione effettuata con successo. Posso lavorare sul database	
				//eseguo la query
				$query = " INSERT INTO segnalazioni (problem) VALUES ('$problem'); ";
				
				//salvo il risultato della query
				$risultato = $mysqli->query($query);//mando in esecuzione la query
			
				if($mysqli->errno > 0){ 

					//non mi serve più lavorare sul db, quindi chiudo la connessione con esso
					$mysqli->close();

					return false;

				}
				else{
					//non mi serve più lavorare sul db, quindi chiudo la connessione con esso
					$mysqli->close();
					return " Segnalazione inviata con successo";
				}	
			
			}
		
		} //Fine sendProblem


		//Funzione per la registrazione di un nuovo utente nel DB

		public function getRegister($nick,$pass,$nome,$cognome,$email){
			
			$ruolo="utente";

			$mysqli = new mysqli(); //Creazione dell'istanza 		
			$mysqli->connect(Settings::$db_host,Settings::$db_user,Settings::$db_password,Settings::$db_name); //connessione al db
	
			//verifico la presenza di errori di connessione al db

			if($mysqli->connect_errno != 0){
				
				//c'è un errore e lo gestisco
				$idErrore = $mysqli->connect_errno; //salvo l'id dell'errore
				$msg = $mysqli->connect_error; //salvo il messaggio dell'errore
				return "Errore connessione al db";
			}
			else{
				
				//Posso procedere con la registrazione dell'uente del DB
				$controlUser = " SELECT nickname FROM utente WHERE nickname = '$nick'; "; //controllo se presente un nickname uguale a quello inserito
				$result = $mysqli->query($controlUser);//mando in esecuzione la query
		
				if($mysqli->errno > 0){

					//non mi serve più lavorare sul db, quindi chiudo la connessione con esso
					$mysqli->close();
				
					return "Nickname already exists";
				}
				
				else{
					//l'utente creato non esiste nel DB, posso inserirlo nel DB
					$query = "INSERT INTO utente (nickname,password,nome,cognome,email,ruolo) 
						  VALUES ('$nick','$pass','$nome','$cognome','$email','$ruolo');";

				//salvo il risultato della query
				$risultato = $mysqli->query($query);
				}

				//controllo se vi sono errori nella query
				if($mysqli->errno > 0){

					//non mi serve più lavorare sul db, quindi chiudo la connessione con esso
					$mysqli->close();
					return "Errore di registrazione";
				
				}
				
				else{
					$mysqli->close();
					return "Utente registrato con successo";				
				}
			}
		}
		
		/* funzione per il login */		

		public function getLogin($user, $pass){
						
			$ruolo = "null"; //la utilizzero per salvare il ruolo dell'utente che logga
			$id = "null"; //la utilizzero per salvare l'id dell'utente che logga

			$mysqli = new mysqli(); //Creazione dell'istanza 
			$mysqli->connect(Settings::$db_host,Settings::$db_user,Settings::$db_password,Settings::$db_name); //connessione al db
	
			//verifico la presenza di errori di connessione al db

			if($mysqli->connect_errno != 0){
				
				//c'è un errore e lo gestisco
				$idErrore = $mysqli->connect_errno; //salvo l'id dell'errore
				$msg = $mysqli->connect_error; //salvo il messaggio dell'errore
				return "Errore connessione al db";
			}
			else{
				//Sono connesso al DB
				//eseguo la query
				$query = "Select * from utente where password='$pass' AND nickname='$user' ";		

				//salvo il risultato della query
				$risultato = $mysqli->query($query);

				//controllo se vi sono errori nella query
				if($mysqli->errno > 0){

					//non mi serve più lavorare sul db, quindi chiudo la connessione con esso
					$mysqli->close();
					return "Errore esecuzione query";
				
				}
				else{
					//non mi serve più lavorare sul db, quindi chiudo la connessione con esso
					$mysqli->close();

					//scorro la riga restituita dalla query (che contiene l'utente che ha loggato)
					while($row = $risultato->fetch_object()){

						$id = ($row->nickname); //salvo l'id
						$ruolo = ($row->ruolo); //salvo il ruolo

					}
					
					//A seconda dei valori di $ruolo, so se ha effettuato il login un utente o l'amministratore

					if($ruolo == "amministratore"){
						
						$_SESSION["loggedAmm"] = true; //amministratore loggato
						$_SESSION["loggedUser"] = false;
						return true;			
					 
					}else{
						if($ruolo == "utente"){
							
							$_SESSION["loggedAmm"] = false;
							$_SESSION["idLoggedUser"] = $id; //id dell'utente loggato
							$_SESSION["loggedUser"] = true;
							return true;						
						
						}else{
							$_SESSION["loggedUser"] = false;
							$_SESSION["loggedAmm"] = false;				
							return false; //errore nel login
						}					
					}
				}
				
			}
		} /* fine loggin*/
	
		
		/* Funzione che permette di vedere tutti gli attori presenti nel DB*/	
	
		public function getActors(){
			$mysqli = new mysqli(); //Creazione dell'istanza 
			$mysqli->connect(Settings::$db_host,Settings::$db_user,Settings::$db_password,Settings::$db_name); //connessione al db
	
			//verifico la presenza di errori di connessione al db

			if($mysqli->connect_errno != 0){
				
				//c'è un errore e lo gestisco
				$idErrore = $mysqli->connect_errno; //salvo l'id dell'errore
				$msg = $mysqli->connect_error; //salvo il messaggio dell'errore
				return "Errore connessione al db";
			}
			else{
				//connessione effettuata con successo. Posso lavorare sul database	
				//eseguo la query
				$query = "SELECT * FROM attore ";
				
				//salvo il risultato della query
				$risultato = $mysqli->query($query);//mando in esecuzione la query
			
				if($mysqli->errno > 0){ 

					//non mi serve più lavorare sul db, quindi chiudo la connessione con esso
					$mysqli->close();

					return false;

				}
				else{
					//non mi serve più lavorare sul db, quindi chiudo la connessione con esso
					$mysqli->close();

					if($risultato->num_rows == 0)
						//la query non ha prodotto risultato, nessun attore presente nel DB
						return "Database Attori Vuoto";
					else{
						
						// stampa di tutti gli attori presenti nel DB
						echo "<table id='tbprd'>\n";
						echo "<tr>\n";	
						echo "<th class='thprd'> Nome </th>\n";
						echo "<th class='thprd'> Cognome </th>\n";
						echo "<th class='thprd'> Filmography </th>\n";
						echo "<th class='thprd'> Personal life </th>\n";
						echo "</tr>\n";
						
						while($row = $risultato->fetch_object()){
							echo "<tr>\n";
							echo "<td> $row->nome </td>\n";
							echo "<td> $row->cognome </td>\n";
							echo "<td> $row->film </td>\n"; 
							echo "<td> $row->vita </td>\n"; 
							echo "</tr>\n";
						}
						echo "</table>\n";
							
					}			
				}
			}	
			
		}			
		
		/* Funzione che permette di vedere tutti i commenti presenti nel DB*/		
		public function getComments(){
			$mysqli = new mysqli(); //Creazione dell'istanza 
		
			$mysqli->connect(Settings::$db_host,Settings::$db_user,Settings::$db_password,Settings::$db_name); //connessione al db
	
			//verifico la presenza di errori di connessione al db

			if($mysqli->connect_errno != 0){
				
				//c'è un errore e lo gestisco
				$idErrore = $mysqli->connect_errno; //salvo l'id dell'errore
				$msg = $mysqli->connect_error; //salvo il messaggio dell'errore
				return "Errore connessione al db";
			}
			else{
				//connessione effettuata con successo. Posso lavorare sul database			
				//eseguo la query
				$query = "SELECT * FROM commento ";
				
				//salvo il risultato della query
				$risultato = $mysqli->query($query);//mando in esecuzione la query
			
				if($mysqli->errno > 0){ 

					//non mi serve più lavorare sul db, quindi chiudo la connessione con esso
					$mysqli->close();

					return false;

				}
				else{
					//non mi serve più lavorare sul db, quindi chiudo la connessione con esso
					$mysqli->close();

					if($risultato->num_rows == 0)

						return "Database commenti vuoto";
					else{
						//stampa dei dati presenti nel DB
						echo "<table id='tbprd'>\n";
						echo "<tr>\n";	
						echo "<th class='thprd'> Username </th>\n";
						echo "<th class='thprd'> Comment </th>\n";
						echo "</tr>\n";
						
						while($row = $risultato->fetch_object()){
							echo "<tr>\n";
							echo "<td> $row->user </td>\n";
							echo "<td> $row->testo </td>\n";
							echo "</tr>\n";
						}
						echo "</table>\n";
							
					}			
				}
			}	
			
		}		
		
			
		/* Funzione che permette di vedere tutti gli attori presenti nel DB*/		
		public function viewUsers(){
			$mysqli = new mysqli(); //Creazione dell'istanza 
		
			$mysqli->connect(Settings::$db_host,Settings::$db_user,Settings::$db_password,Settings::$db_name); //connessione al db
	
			//verifico la presenza di errori di connessione al db

			if($mysqli->connect_errno != 0){
				
				//c'è un errore e lo gestisco
				$idErrore = $mysqli->connect_errno; //salvo l'id dell'errore
				$msg = $mysqli->connect_error; //salvo il messaggio dell'errore
				return "Errore connessione al db";
			}
			else{
				//connessione effettuata con successo. Posso lavorare sul database	
				//eseguo la query
				$query = "SELECT * FROM utente ";
				
				//salvo il risultato della query
				$risultato = $mysqli->query($query);//mando in esecuzione la query
			
				if($mysqli->errno > 0){ 

					//non mi serve più lavorare sul db, quindi chiudo la connessione con esso
					$mysqli->close();

					return false;

				}
				else{
					//non mi serve più lavorare sul db, quindi chiudo la connessione con esso
					$mysqli->close();

					if($risultato->num_rows == 0)

						return "Database Utenti Vuoto";
					else{
						
						echo "<table id='tbprd'>\n";
						echo "<tr>\n";	
						echo "<th class='thprd'> Nickname </th>\n";
						echo "<th class='thprd'> Password </th>\n";
						echo "<th class='thprd'> Nome </th>\n";
						echo "<th class='thprd'> Cognome </th>\n";
						echo "<th class='thprd'> Email </th>\n";
										
						echo "</tr>\n";
						
						while($row = $risultato->fetch_object()){
							echo "<tr>\n";
							echo "<td> $row->nickname </td>\n";
							echo "<td> $row->password </td>\n";
							echo "<td> $row->nome </td>\n"; 
							echo "<td> $row->cognome </td>\n"; 
							echo "<td> $row->email </td>\n";
							echo "</tr>\n";
						}
						echo "</table>\n";
							
					}			
				}
			}	
			
		}	

		/*Funzione per la gestione del logout*/

		public function getLogout(){

			$_SESSION = array(); //reset array $_SESSION

			//terminazione della validità del cookie
			if(session_id() != "" || isset($_COOKIE[session_name()])){ 
				
				//imposta il termine della validità del cookie al mese scorso
				setcookie(session_name(), '', time() - 2592000, '/');			

			}		
			//distruzione del file di sessione	
			session_destroy();

			return "logout";
		}
	}
	
?>
