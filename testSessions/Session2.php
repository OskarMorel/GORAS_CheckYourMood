<?php
	// Démarrage de la session
	session_start();
	
	// Test si on est bien connecté (session existante et bon numéro de session
	if (!isset($_SESSION['nomInternaute']) || !isset($_SESSION['prenomInternaute']) || !isset($_SESSION['numeroSession']) || $_SESSION['numeroSession']!=session_id()) {
		// Renvoi vers la page de connexion
  		header('Location: Session1.php');
  		exit();
	}	
	
	// Si on demande à se deconnecter, fin de la session et renvoi vers la page de connexion
	if (isset($_POST['deconnexion']) && $_POST['deconnexion']=='1') {
		session_destroy();
		header('Location: Session1.php');
  		exit();
	}
	
	// Stockage d'une information supplémentaire dans la session
	$_SESSION['etape2']="Page Session 2" ;
?>
<!DOCTYPE html>
<html>
	 <head>
		  <title>Test SESSIONS 2  (session2.php)</title>
		  <meta charset="utf-8">
	 </head>
	 <body>
	 
	 <?php 
		echo '<h1>Page session 2</h1>';
		$leNom=$_SESSION['nomInternaute']; 
		$lePrenom=$_SESSION['prenomInternaute'];
		
		echo "Bonjour $leNom $lePrenom<br />";
		echo "Mon id de session est : " . session_id()."<br />";		
		
		?>	
		<form method="post" action="Session2.php">
			<input type="hidden" name="deconnexion" id="deconnexion" value="1">
			<input type="submit" value="Deconnexion" />
		</form>	
	 </body>
</html>
