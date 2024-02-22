<?php
try{
  
  $db = new PDO('sqlite:database.sqlite');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
// Bind dei parametri
$user= $_GET['username_utente'];
$pass= $_GET['password_utente'];

   // Query per selezionare tutti gli elementi dalla tabella
   $query = "SELECT * FROM utenti WHERE username = :username AND password = :password";
  // Esecuzione della query 
  $stmt = $db->prepare($query);
  
  $stmt->bindParam(':username', $user);
  $stmt->bindParam('password', $pass);
  
// Esecuzione della query
$stmt->execute(array(':username' => $user, ':password'=>$pass));
// Risultato della query
$result = $stmt->fetchAll();
  // Conteggio dei risultati
  $count = count($result);
  
  if ($count > 0) {
    echo "login effettuato con sucesso"; 
  }
  else {
    echo "login non conosciuto";
  }
}
  catch (PDOException $e){
    echo "Errore durante l'inserimento del prodotoo: " . $e->getMessage();
  }


?>
