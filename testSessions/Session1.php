<?php session_start() ?>
<!DOCTYPE html>
<html>
	 <head>
		  <title>Test Sessions 1 (session1.php)</title>
		  <meta charset="utf-8">
	 </head>
	 <body>
	 
	 <?php 

		echo '<h1>Page session 1</h1>';
		// test si on est passé par le formulaire et que les données ont bien été envoyées.
		if (isset($_GET['nom']) && $_GET['nom']!="" && isset($_GET['prenom']) && $_GET['prenom']!="" && isset($_GET['nbre'])) {
			$leNom=htmlspecialchars($_GET['nom']); 
			$lePrenom=htmlspecialchars($_GET['prenom']);
			$nbre=(int) htmlspecialchars($_GET['nbre']);
			
			// Stockage dans la session //
			$_SESSION['nomInternaute']=$leNom;		// Stockage nom dans la session
			$_SESSION['prenomInternaute']=$lePrenom;// Stockage prénom dans la session
			$_SESSION['numeroSession']=session_id();// Stockage numéro de session pour éviter les piratages.
			//////////////////////////////
			
			if ($nbre>100) {
				// Blocage pour ne pas surcharger le serveur au cas ou un petit malin mettre une très grosse valeur dans nbre
				$nbre=100;
			}
			for ($i=1;$i<=$nbre;$i++) {
				echo "Bonjour $leNom $lePrenom - $i<br />";	
			}
			echo "<br/>";
			
			// Lien vers la page 2
			echo "<a href='Session2.php'>Cliquer Ici pour la page 2</a><br />" ; 
			echo "Mon id de session est : " . session_id()."<br />";
		} else { ?>
			<!-- Sinon affichage du formulaire -->
			<form method="get" action="Session1.php">
				<label for="nom">Votre nom : </label> 
				<input type="text" name="nom" id="nom" value="<?php if (isset($_GET['nom'])) echo htmlspecialchars($_GET['nom']);?>"/>
				<label for="nom">Votre prénom : </label> 
				<input type="text" name="prenom" id="prenom" value="<?php if (isset($_GET['prenom'])) echo htmlspecialchars($_GET['prenom']);?>" />
				<input type="hidden" name="nbre" id="nbre" value="3">
				<input type="submit" value="Envoyer" />
			</form>	
		<?php 	
		}
		?>	
	 </body>
</html>
