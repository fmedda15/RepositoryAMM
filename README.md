# PROGETTO AMM 2015 #

### INDICE ###

1. Breve descrizione dell'applicazione.
2. Struttura dell'applicazione
3. Elenco requisiti rispettati 
4. Credenziali per l'autenticazione

### DESCRIZIONE DELL'APPLICAZIONE ###

l'applicazione ActorsDB simula un sito internet per la visualizzazione online degli attori presenti nel DB. Un utente non 
registrato può visualizzare gli attori e le informazioni legate ad essi, un utente registrato, dopo aver
effettuato il rispettivo login, può, oltre che vedere le informazioni legate agli attori, lasciare commenti nel sito (magari
creando discussioni assieme agli altri utenti). 
L'amministratore invece deve occuparsi di tenere aggiornato il DB, con l'aggiunta di nuovi attori, l'eliminazione 
di utenti e commenti e la comunicazione di avvisi diretti agli utenti della pagina riguardanti qualsiasi
 novità sul sito.


### STRUTTURA DELL'APPLICAZIONE ###

Il database dell'applicazione è stato progettato con tre tabelle, nel seguente modo : 

-utente : La tabella utente identifica gli utenti che possono loggare nel sito internet. 
		  Un generico utente possiede il proprio nickname, univoco per tutti e che permette il riconoscimento dell'user, una
		  password che gli permette di accedere al sito tramite il login e i vari dati persali, che sono nome, cognome e 
		  email; Oltre a questi dati è presente anche un campo ruolo, usato per differire gli utenti standard dall'amministratore di sistema
		  

-attore : La tabella attore rappresenta una attore presente nel sito. Ogni attore possiede un Id unico, per permetterne il riconoscimento,
	      e le varie informazioni riguardanti ad esso, che sono: nome, cognome, film che rappresenta la filmografia e vita che rappresenta la vita privata.

-commenti : La tabella commento identifica i commenti che si possono rilasciare nel sito, ogni commento possiede 3 campi, che sono:
		    id che permette di riconoscere il commento nel sito, user che rappresenta una chiave esterna garantendo il riconoscimento dell'user 
		    che ha postato quel determinato commento, ed infine il campo testo, ovvero il commento vero e proprio.

Per l'MVC ho diviso i file : un solo Controller che gestisce i tre model : 

- modelSession : contiene le funzioni di login, logout e registrazione
- modelAmm : contiene le funzioni dell'amministratore
- modelUser : contiene le funzioni dell'utente

L'amministratore può : 

- Aggiungere un attore 
- Aggiungere un commento
- Eliminare un utente
- Eliminare un commento
- Eliminare un attore
- Visualizzare la lista attori
- Visualizzare la lista utenti
- Visualizzare la lista commenti


L'utente generico loggato puo:
 
- Aggiungere un commento
- Visualizzare la lista attori
- Visualizzare la lista commenti
- Visualizzare il proprio profilo
- Modificare il proprio profilo

L'utente generico non loggato puo:
 
- Visualizzare la lista attori
- Visualizzare la lista commenti
- Registrarsi al sito
- Effettuare il login


### REQUISITI RISPETTATI ###

1. Utilizzo di HTML e CSS : Si, il file css sta nella cartella css ed è unico per tutto il progetto.
2. Utilizzo di PHP e MySQL : Si
3. Utilizzo del pattern MVC : Si, ho creato un controller e tre model.
4. Almeno due ruoli : Si, utente e amministratore.
5. Almeno una transazione : Si.
 

### CREDENZIALI ###

Per l'autenticazione, le credenziali degli utenti che son già creati sono : 

1. AMMINISTRATORE -> User : root , Password : root
2. UTENTE1 -> Nickname : FMedda , Password : nuvola 
3. UTENTE2 -> Nickname : Principe , Password : triplette 

E' possibile creare nuovi utenti, per far si che essi accedano al sito, popolando la tabella utente del database.
