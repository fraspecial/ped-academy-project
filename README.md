# ped-academy-project

Il progetto funziona da piattaforma multiutente con un'interfaccia di signup e login. Queste sono le uniche due pagine accessibili senza essere autenticati. Nel caso si tentasse di accedere ad altre pagine del blog si viene reindirizzati in automatico alla pagina di login. Ogni utente può aggiungere, modificare ed eventualmente eliminare post, immagine del profilo, bio testuale, lingue conosciute, portfolio di immagini. È inoltre possibile modificare i propri dati di registrazione ed eliminare l'account. Tutte le informazioni vengono conservate in un database e quando prelevate da esso vengono restituite secondo una logica object-oriented, accessibili tramite i metodi pubblici di ogni oggetto creato. Per il front-end si è utilizzato il framework Bootstrap.

Gli oggetti utilizzati sono:

- Utente -> ha come attributi tutte le informazioni relative all'utente, tra cui un oggetto PostRepository, un oggetto LangaugeList e un               oggetto Portfolio.

- PostRepository -> ha come unico atttributo un array di oggetti Post.

- Post -> ha come attributi titolo, contenuto, data di creazione del post e un oggetto TagList.

- TagList -> ha come unico attributo un array di oggetti Tag.

- Tag -> ha come attributo unico il nome del tag.

- LanguageList -> ha come unico attributo un array di oggetti Language.

- Language -> ha come attributi il nome della lingua e il livello di conoscenza della stessa in listeing, reading, writing e speaking.

- Portfolio -> ha come unico attributo un array di oggetti Picture.

- Picture -> ha come attributi titolo e descrizione dell'immagine e il path relativo della stessa.

Tutte le pagine sono provviste di navbar e footer dinamici.
Se non si è autenticati, la navbar presenta un link in alto a sinistra ('Home') alla pagina di login e un pulsante in alto a destra a quella di signup. Una volta effettuato l'accesso , la scritta 'Home' viene sostituita dall'username dell'utente, mentre al posto del pulsante di signup ne troviamo uno che reindirizza alla vista post.php e un altro per effettuare il logout.
All'interno del footer, invece, si trova una modale con un form il cui contenuto viene modificato, a seconda delle necessità, dinamicamente via Javascript o JQuery. La presenza di campi input di tipo hidden differenzia i vari form, in modo tale che sulla base dei valori recati da questi campi, la pagina php destinataria del form sappia quali operazioni effettuare con i dati ricevuti.

La validazione dei form non è curata con grande sicurezza. I campi input vengono quasi sempre validati lato client, sfruttandone gli attributi 'required' e 'pattern' e utilizzando Javascript. Per i form in cui è richiesto di immettere la password due volte per conferma, vista l'impossibilità di imporre con qualche attributo HTML l'uguaglianza tra i valori campi 'password' e 'password-confirm', Bootstrap valuta questi ultimi corretti anche quando non lo sono. Per aggirare questa problematica, si è scritta una funzione in Javascript che blocca l'invio del form nel caso gli input non siano identici e assegna a questi una classe denominata 'pseudo-invalid', avente lo stesso CSS (che si sovrascrive su quello dei campi validati secondo Bootstrap) previsto per gli elementi di pseudo-classe 'invalid'. Soltanto l'immissione della password al momento della registrazione e della eventuale modifica password è validata lato server facendo un match con un'espressione regolare.
Nel caso di errori di autenticazione, o se si tentasse di utilizzare email o username già presenti nel database nel momento della registrazione o della modifica dei propri dati, viene visualizzato un messaggio di errore cambiando il valore predefinito di alcune variabili globali.

Si procede adesso a una descrizione più dettagliata delle singole pagine visibili all'utente.



index.php

A seconda che si sia autenticati o meno la pagina presenta il form di login o la lista dei post pubblicati, ordinati dal più recente al più vecchio. L'interfaccia di login richiede username e password e permette, segnando la checkbox "ricordami" di settare un cookie della durata di 10 minuti che compila automaticamente il campo username per eventuali accessi seguenti.
Effettuato l'accesso viene visualizzata la lista dei propri post. Ogni post è eliminabile e modificabile in ogni sua parte (titolo, contenuto e tags), salvo la data di creazione. Cliccando su ogni tag la pagina visualizza soltanto i post con i tag omonimi. Per tornare alla visualizzazione originaria, invece, è sufficiente cliccare sul link in alto a sinistra (con su scritto il proprio username) che reindirizza alla lista completa dei post. È inoltre possibile filtrare i post per tag anche compilando un piccolo form di ricerca dei tag presente in alto sulla destra.

[DA COMPLETARE]
