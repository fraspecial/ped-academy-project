# ped-academy-project

Il progetto funziona da piattaforma multiutente con un'interfaccia di signup e login. Queste sono le uniche due pagine accessibili senza essere autenticati. Nel caso si tentasse di accedere ad altre pagine del blog si viene reindirizzati in automatico alla pagina di login. Ogni utente può aggiungere, modificare ed eventualmente eliminare post, immagine del profilo, bio testuale, lingue conosciute, portfolio di immagini. È inoltre possibile modificare i propri dati di registrazione ed eliminare l'account. Tutte le informazioni vengono conservate in un database e quando prelevate da esso vengono restituite secondo una logica object-oriented, accessibili tramite i metodi pubblici di ogni oggetto creato. Per il front-end si è utilizzato il framework Bootstrap.


Oggetti utilizzati

- Utente -> ha come attributi tutte le informazioni relative all'utente, tra cui un oggetto PostRepository, un oggetto LangaugeList e un               oggetto Portfolio.

- PostRepository -> ha come unico atttributo un array di oggetti Post.

- Post -> ha come attributi titolo, contenuto, data di creazione del post e un oggetto TagList.

- TagList -> ha come unico attributo un array di oggetti Tag.

- Tag -> ha come attributo unico il nome del tag.

- LanguageList -> ha come unico attributo un array di oggetti Language.

- Language -> ha come attributi il nome della lingua e il livello di conoscenza della stessa in listeing, reading, writing e speaking.

- Portfolio -> ha come unico attributo un array di oggetti Picture.

- Picture -> ha come attributi titolo e descrizione dell'immagine e il path relativo della stessa.


Navbar e footer

Tutte le pagine sono provviste di navbar e footer dinamici.
Se non si è autenticati, la navbar presenta un link in alto a sinistra ('Home') alla pagina di login e un pulsante in alto a destra a quella di signup. Una volta effettuato l'accesso , la scritta 'Home' viene sostituita dall'username dell'utente, mentre al posto del pulsante di signup ne troviamo uno che reindirizza alla vista post.php e un altro per effettuare il logout. In caso di logout si viene reindirizzati alla pagina di login.
All'interno del footer, invece, si trova una modale con un form il cui contenuto viene modificato, a seconda delle necessità, dinamicamente via Javascript o JQuery.

Form

Visto l'utilizzo di molti form, parecchi dei quali creati dinamicamente nella stessa pagina con il medesimo attributo 'action', si è scelto di ricorrere a campi input di tipo hidden per differenziarli, in modo tale che sulla base dei valori recati da questi campi, la pagina php destinataria del form sappia quali operazioni effettuare con i dati ricevuti.
La validazione dei form avviene nella maggior parte dei casi sia lato client, sfruttandone gli attributi 'required' e 'pattern' e utilizzando Javascript, che server, verificando che tutti i campi richiesti siano stati effettivamente inviati. Inoltre, per verificare la password al momento della registrazione e della eventuale modifica, viene fatto un match con un'espressione regolare in PHP. Per i form in cui è richiesto di immettere la password due volte per conferma, vista l'impossibilità di imporre con qualche attributo HTML l'uguaglianza tra i valori campi 'password' e 'password-confirm', Bootstrap valuta questi ultimi corretti anche quando non lo sono. Per aggirare questa problematica, si è scritta una funzione in Javascript che blocca l'invio del form nel caso gli input non siano identici e assegna a questi una classe denominata 'pseudo-invalid', avente lo stesso CSS (che si sovrascrive su quello dei campi validati secondo Bootstrap) previsto per gli elementi di pseudo-classe 'invalid'. Anche in PHP si verifica che le due password non differiscano.
Nel caso di errori di autenticazione, o se si tentasse di utilizzare email o username già presenti nel database nel momento della registrazione o della modifica dei propri dati, viene visualizzato un messaggio di errore cambiando il valore predefinito di alcune variabili globali.

Immagini
Tutte le immagini aggiunte dall'utente al proprio portfolio o selezionate come immagini del profilo vengono salvate in una cartella dal server e ne viene memorizzato il percorso relativo nel databse. Nel momento in cui l'utente scegliesse di eliminare una delle immagini, se questa non è utilizzata anche da un altro utente viene rimossa dalla cartella.


Si procede adesso a una descrizione più dettagliata delle singole pagine visibili all'utente.


index.php

A seconda che si sia autenticati o meno la pagina presenta il form di login o la lista dei post pubblicati, ordinati dal più recente al più vecchio. L'interfaccia di login richiede username e password e permette, segnando la checkbox "ricordami" di settare un cookie della durata di 10 minuti che compila automaticamente il campo username per eventuali accessi seguenti. In caso di username o password non valida, la variabile globale 'err-login' viene settata true, attivando così la visualizzazione di un messaggio di errore.
Effettuato l'accesso viene visualizzata la lista dei propri post. Ogni post è eliminabile e modificabile in ogni sua parte (titolo, contenuto e tags), salvo la data di creazione. Cliccando su ogni tag la pagina visualizza soltanto i post con i tag omonimi. Per tornare alla visualizzazione originaria, invece, è sufficiente cliccare sul link in alto a sinistra (con su scritto il proprio username) che reindirizza alla lista completa dei post. È inoltre possibile filtrare i post per tag anche compilando un piccolo form di ricerca dei tag presente in alto sulla destra. Nel caso di modifica o eliminazione dei tag di un post o di eliminazione del post stesso, nel caso in cui i vecchi tag non fossero presenti in altri post dell'utente o di altri utenti, l'elemento tag correlato viene rimosso anche dal database. 


signup.php

Viene visualizzato un form che richiede all'utente nome, cognome, email, username e password per registrarsi. La password viene richiesta due volte e che la conferma della password vada a buon fine viene verificato sia lato client che lato server, rispettivamente in Javascript e PHP nelle modalità già descritte. Come scritto sopra, il server verifica che username ed email non siano già utilizzati da un altro utente. In caso contrario, le variabili globali 'err-username' e 'err-email' vengono settate true, condizione che fa sì che venga renderizzato un messaggio di errore. Effettuata la registrazione, si viene reindirizzati alla vista about.php.


about.php

  Immagine del profilo
  In assenza di un'immagine del profilo, viene utilizzata un'immagine standard. Passando con il cursore sopra l'immagine appare un      overlay con l'icona di una macchina fotografica (vengono utilizzate le funzione JQuery fadeIn e fadeOut); cliccando su di essa (che non è altro che la label di un input nascosto di tipo file) si può impostare la propria immagine del profilo scegliendo tra le immagini presenti sul proprio host. Se l'immagine del profilo è già stata impostata, oltre all'icona già citata ne appare un'altra (un bidone) più piccola nell'angolo in alto a sinistra, cliccando sulla quale l'immagine viene eliminata.

  Bio
  Accanto all'immagine del profilo, un campo di testo preceduto dal nome e dal cognome dell'utente può essere compilato a piacere   dell'utente, modificato e rimosso. Per farlo basta cliccare su un link che cambia dinamicamente a seconda che la bio sia presente oppure no ('Aggiungi la tua bio' oppure 'Modifica'): appare una modale con una textarea compilabile ed eventualmente già automaticamente  riempita con la bio esistente. Per rimuovere la bio è sufficiente eliminare tutto il testo presente nella textarea ed inviare il form.

  Lingue
  Le lingue conosciute vengono renderizzate in una tabella di sei colonne e numero di righe pari al numero di lingue. Ogni cella reca nell'ordine: due icone; una c he apre una modale con un form per modificare i livelli (A1, A2, B1, B2, C1, C2) di listening, reading, writing e speaking di una lingua, l'altra per eliminare l'intera riga relativa alla lingua dalla tabella; nome della lingua; livello di listening; livello di reading; livello di writing; livello di speaking. Indipendentemente dal contenuto della tabella, esiste sempre in fondo a quest'ultima una riga aggiuntiva con una sola cella lunga quanto tutta la tabella con un link che apre una modale per inserire una nuova lingua e impostare i livelli di conoscenza della stessa nei vari ambiti.

  Portfolio
  In questa sezione l'utente può creare la propria raccolta di immagini che verranno visualizzate all'interno di un carousel. Nel caso in cui la raccolta sia vuota viene visualizzata un'immagine standard. Passando il cursore sull'immagine, al verifcarsi dell'evento hover, appare una caption (vengono utilizzate le funzioni JQuery slideUp e slideDown) con un titolo e una descrizione e delle icone per aggiungere e rimuovere immagini o per modificarne titolo e descrizione. Nel caso in cui il portfolio non contenga immagini, ovviamente, appare solo l'icona per aggiungerne; nel caso in cui ne contenga, invece, oltre a quelle già citate appare anche un'altra icona accanto al titolo della sezione "Portfolio", per eliminare l'intero portfolio. L'aggiunta di una nuova immagine e la modifica di una già esistente avviene anche in questo caso tramite il form presente nella modale e modificato dinamicamente.


post.php

La pagina presenta una card contenente un form con campi di input per titolo (required), contenuto (required) e tag del psot. L'attributo pattern dell'input relativo al tag richiede che ogni tag sia preceduto dal simbolo di hashtag (#) e che contenga soltanto lettere e numeri, senza spazi. Il rispetto di questa specifica tuttavia non viene verifcato oltre l'HTML.

settings.php

In questa pagina è possibile modificare i dati dell'account con cui l'utente si è registrato in fase di signup. Per ragioni di ulteriore sicurezza si è scelto di rendere visibile il contenuto della pagina e quindi di effettuare modifiche soltanto dopo avere inserito nuovamente la propria password (oltre che in fase di login). Appare dunque una modale sulla pagina bianca con un form per l'autenticazione (solo password, senza username). Se l'autenticazione va a buon fine viene settata e posta a false la variabile di sessione 'lock'; vicevrsa viene posta a true. In questo modo, effettuata l'autenticazione (solo cioè se la variabile è settata e posta a false) viene visualizzato un form identico a quello della pagina di signup, ma precompilato coi dati dell'utente in tutti i campi, salvo quello della password. L'utente potrà modificare a proprio piacimento i dati, cambiando anche la password, purché, come in fase di signup, non utilizzi username o email già registrate nel database, a meno che non siano proprio le sue. È inoltre presente un link per eliminare l'account. Se ci si clicca, appare una richiesta di conferma dell'operazione (tramite funzione confirm di Javascript) ed eventualmente l'account viene eliminato dal database con tutte le sue informazioni correlate e viene eseguito il logout. Nel caso in cui si abbandoni la pagina la variabile di sessione 'lock' viene disabilitata per far sì che in caso di ritorno sia richiesta nuovamente l'autenticazione.
