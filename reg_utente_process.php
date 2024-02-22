<?php 
   $user = $_GET['nuovo_username_utente'];
   $pass = $_GET['nuova_password_utente'];

  if ($user != "" && $pass != "") {
try {
  $db = new PDO('sqlite:database.sqlite');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $res = $db->exec(
    "CREATE TABLE IF NOT EXISTS utenti (
      id INTEGER PRIMARY KEY AUTOINCREMENT, 
      username TEXT, 
      password TEXT 

    )"
  );

   $db1 = new PDO('sqlite:database.sqlite');
    $db1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);




  // Query di inserimento preparata
    $stmt1 = $db1->prepare("INSERT INTO utenti (username, password) VALUES (:user, :pass)");

  // Esecuzione della query di inserimento
    $stmt1->execute(array(
        ':user' => $user,
        ':pass' => $pass
    ));
 echo("utente registrato con successo");

  $db = new PDO('sqlite:database.sqlite');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Query per selezionare tutti gli elementi dalla tabella
  $query = "SELECT * FROM utenti";

  // Esecuzione della query
  $stmt = $db->query($query);

  // Recupero dei risultati
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  
  

 } 


  catch (PDOException $e) {
        echo "Errore durante l'inserimento del prodotoo: " . $e->getMessage();
    }}
else echo("dati mancanti");


?>
