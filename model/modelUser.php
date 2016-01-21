<?php

	//Gestione delle operazioni permesse agli utenti

	class ModelUser{
		
		// funzione per la visualizzazione dei commenti nel DB
		function viewcommentsUser(){
			
			
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
				$query = " SELECT * FROM commento ";

				//salvo il risultato della query
				$risultato = $mysqli->query($query);//mando in esecuzione la query
			
				//significa che non ci sono commenti registrati
				if($risultato->num_rows == 0){ 
						return "Nessun commento presente";					
						}
				else{
					//non mi serve più lavorare sul db, quindi chiudo la connessione con esso
					$mysqli->close();
				
					echo "<table id='tbprd'>\n";
					echo "<tr>\n";	
					echo "<th class='thprd'> Id </th>\n";
					echo "<th class='thprd'> User </th>\n";
					echo "<th class='thprd'> Commento </th>\n";
					echo "</tr>\n";
				
					while($row = $risultato->fetch_object()){
						echo "<tr>\n";
						echo "<td> $row->id </td>\n";
						echo "<td> $row->user </td>\n";
						echo "<td> $row->testo </td>\n"; 
						echo "</tr>\n";
					}
					echo "</table>\n";	
						

				}
					
			}		
			
		}//fine viewComments()
	
	// funzione per l'aggiunta di un commento nel DB
		function addCommentUser($user,$testo){
				
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

				$query2 = "INSERT INTO commento (user,testo) VALUES ('$user','$testo'); ";
				
				$risultato = $mysqli->query($query2);

				if($mysqli->errno > 0){
					
					//in caso di errore, vuol dire che c'è almeno un ordine in corso per quella carta e non posso eliminarla	
					//non mi serve più lavorare sul db, quindi chiudo la connessione con esso
					$mysqli->close();
					
					return "Non è stato possibile aggiungere il commento!";					
				}

				else{
					//non mi serve più lavorare sul db, quindi chiudo la connessione con esso
					$mysqli->close();
				
					return "commento aggiunto correttamente";

				}
			}
				
			
			
		}//fine addComment()
		

	/* Funzione che permette di vedere tutti gli attori presenti nel DB*/		

		public function viewActorsUser(){
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

						return "Database Attori Vuoto";
					else{
						
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

	// funzione per la visualizzazione dei commenti nel DB
		function viewProfile($user){
			
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
				$query = " SELECT * FROM utente where nickname='$user' ";
				//salvo il risultato della query
				$risultato = $mysqli->query($query);//mando in esecuzione la query
			
				//Erroraccio
				if($risultato->num_rows == 0){ 
						return "User errato";					
						}
				else{
					//non mi serve più lavorare sul db, quindi chiudo la connessione con esso
					$mysqli->close();
				
					echo "<table id='tbprd'>\n";
					echo "<tr>\n";	
					echo "<th class='thprd'> Nickname </th>\n";
					echo "<th class='thprd'> Password </th>\n";
					echo "<th class='thprd'> Nome </th>\n";
					echo "<th class='thprd'> Cognome </th>\n";
					echo "<th class='thprd'> Email </th>\n";
					echo "<th class='thprd'> Ruolo </th>\n";
					echo "</tr>\n";
				
					while($row = $risultato->fetch_object()){
						echo "<tr>\n";
						echo "<td> $row->nickname </td>\n";
						echo "<td> $row->password </td>\n";
						echo "<td> $row->nome </td>\n"; 
						echo "<td> $row->cognome </td>\n"; 
						echo "<td> $row->email </td>\n"; 
						echo "<td> $row->ruolo </td>\n"; 
						echo "</tr>\n";
					}
					echo "</table>\n";	
						

				}
					
			}		
			
		}//fine viewComments()

	public function makeSettings($nick,$pass,$nome,$cognome,$email){
			
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
				
				//Connesso al DB
				$controlUser = " SELECT nickname FROM utente WHERE nickname = '$nick'; "; //controllo se presente un nickname uguale a quello inserito
				$result = $mysqli->query($controlUser);//mando in esecuzione la query
		
				if($mysqli->errno > 0){

					//non mi serve più lavorare sul db, quindi chiudo la connessione con esso
					$mysqli->close();
				
					return "Nickname already exists";
				}
				
				else{
					$query = "INSERT INTO utente (nickname,password,nome,cognome,email,ruolo) 
						  VALUES ('$nick','$pass','$nome','$cognome','$email','$ruolo');";

				//salvo il risultato della query
				$risultato = $mysqli->query($query);
				}

				//controllo se vi sono errori nella query
				if($mysqli->errno > 0){

					//non mi serve più lavorare sul db, quindi chiudo la connessione con esso
					$mysqli->close();
					return "Errore di modifica";
				
				}
				
				else{
					$mysqli->close();
					return "Modifica avvenuta con successo";				
				}
			}
		}
}//fine ModelUser()

?>
