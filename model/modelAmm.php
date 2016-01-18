<?php

/*Model dell'amministratore, racchiude tutte le funzioni che possono essere eseguite dall'amministratore, quali : 
	Aggiunta di commenti, attori, eliminazione User, Attori e commenti, oltre alla visualizzazione di tutti i dati appartenenti a utenti, attori e commenti
*/

	class ModelAmm{
		
		// funzione per l'aggiunta di un attore nel DB
		function addActor($id,$nome,$cognome,$film,$vita){
			
			
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
				$query = " SELECT * FROM attore WHERE nome='$nome' AND cognome='$cognome' AND id='$id'"; 
				//salvo il risultato della query
				$risultato = $mysqli->query($query);//mando in esecuzione la query
			
				if($risultato->num_rows == 0){ //vuol dire che l'id inserito non corrisponde ad una attore presente nella lista						
						//ho una query senza errori. quindi posso inserire l'attore nel DB
						$query2 = "INSERT INTO attore (id,nome,cognome,film,vita) VALUES ('$id','$nome','$cognome','$film','$vita'); ";
						
						$risultato = $mysqli->query($query2);

						if($mysqli->errno > 0){
							
							//in caso di errore
							//non mi serve più lavorare sul db, quindi chiudo la connessione con esso
							$mysqli->close();
							
							return "Non è stato possibile aggiungere l'attore!";					
						}
						else{
							//non mi serve più lavorare sul db, quindi chiudo la connessione con esso
							$mysqli->close();
						
							return "attore aggiunto correttamente";

						}
					
				}
			}	
			
			
		}//fine addActor()

	// funzione per l'eliminazione di un attore nel DB
		function deleteActor($nome,$cognome){
			
			
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
				$query = " SELECT * FROM attore WHERE nome='$nome' AND cognome='$cognome' ";
				//salvo il risultato della query
				$risultato = $mysqli->query($query);//mando in esecuzione la query
			
				if($risultato->num_rows == 1){ //vuol dire che l'id inserito corrisponde ad un'attore, quindi l'attore richiesto esiste						
						//ho una query senza errori. Eseguo la query per l'eliminazione dell'attore dal DB
						$query2 = "DELETE FROM attore WHERE nome='$nome' AND cognome='$cognome' ";
						
						$risultato = $mysqli->query($query2);

						if($mysqli->errno > 0){
							
							//in caso di errore
							//non mi serve più lavorare sul db, quindi chiudo la connessione con esso
							$mysqli->close();
							
							return "Non è stato possibile eliminare l'attore!";					
						}
						else{
							//non mi serve più lavorare sul db, quindi chiudo la connessione con esso
							$mysqli->close();
						
							return "attore eliminato correttamente";

						}
					
				}
			}	
			
			
		}//fine deleteActor()

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
						//la query non ha prodotto nessun risultato, lista vuota	
						return "Database Attori Vuoto";
					else{
						//stampa della tabella con le informazioni presenti nel DB
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
			
		}		/* Fine ViewActors */

	// funzione per la visualizzazione degli utenti registrati nel DB
		function viewUsers(){
			
			
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
				$query = " SELECT * FROM utente ";
				
				//salvo il risultato della query
				$risultato = $mysqli->query($query);//mando in esecuzione la query
			
				if($risultato->num_rows == 0){ //significa che non ci sono user registrati
						return "Nessun utente registrato nel DB";					
						}
				else{
					//non mi serve più lavorare sul db, quindi chiudo la connessione con esso
					$mysqli->close();
					
					//Stampa di tutti gli utenti registrati nel DB
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
			
		}//fine viewUsers()
		

		// funzione per l'eliminazione di un attore nel DB
		function deleteUser($nickname){
			
			
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
				$query = " SELECT * FROM utente WHERE nickname='$nickname' AND ruolo='utente' ";
				
				//salvo il risultato della query
				$risultato = $mysqli->query($query);//mando in esecuzione la query
			
				if($risultato->num_rows == 1){ //la query ha prodotto un risultato, l'utente cercato è presente nel DB, posso procedere con l'eliminazione 
						$query2 = "DELETE FROM utente WHERE nickname='$nickname' AND ruolo='utente' ";
						
						$risultato = $mysqli->query($query2);

						if($mysqli->errno > 0){
							
							//in caso di errore	
							//non mi serve più lavorare sul db, quindi chiudo la connessione con esso
							$mysqli->close();
							
							return "Non è stato possibile eliminare l'utente!";					
						}
						else{
							//non mi serve più lavorare sul db, quindi chiudo la connessione con esso
							$mysqli->close();
						
							return "Utente eliminato correttamente";

						}
					
				}
			}	
			
			
		}//fine deleteUser()
	
	
		// funzione per la visualizzazione dei commenti nel DB
		function viewcomments(){
			
			
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
					
					//stampa di tutti i commenti presenti nel DB
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
		

	// funzione per l'eliminazione di un commento nel DB
		function deleteComment($id){
			
			
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
				$query = " SELECT * FROM commento WHERE id='$id' ";
				//salvo il risultato della query
				$risultato = $mysqli->query($query);//mando in esecuzione la query
			
				if($risultato->num_rows == 1){ //vuol dire che l'id inserito corrisponde ad un commento presente nel DB						
						//ho una query senza errori. Posso procedere con l'eliminazione del commento
						$query2 = "DELETE FROM commento WHERE id='$id' ";
						
						$risultato = $mysqli->query($query2);

						if($mysqli->errno > 0){
							// errorrr
							$mysqli->close();
							
							return "Non è stato possibile eliminare il commento!";					
						}
						else{
							//non mi serve più lavorare sul db, quindi chiudo la connessione con esso
							$mysqli->close();
						
							return "Commento eliminato correttamente";

						}
					
				}
			}	
			
			
		}//fine deleteComment()

	// funzione per l'aggiunta di un commento nel DB
		function addComment($id,$testo){
			
			
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
				$query = " SELECT * FROM commento WHERE id='$id' "; 

				//salvo il risultato della query
				$risultato = $mysqli->query($query);//mando in esecuzione la query
			
				if($risultato->num_rows == 0){ //vuol dire che l'id inserito non corrisponde a nessun commento presente nel DB						
						//ho una query senza errori. Posso procedere con l'inserimento del commento
						$query2 = "INSERT INTO commento (id,user,testo) VALUES ('$id','AMMINISTRATORE','$testo'); ";
						
						$risultato = $mysqli->query($query2);

						if($mysqli->errno > 0){
							
							//in caso di errore	
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
			}	
			
			
		}//fine addComment()

	}//fine model 

?>
