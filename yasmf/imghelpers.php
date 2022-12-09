<?php

/**
 * imagehelpers.php
 * @author Equipe 6 | Gauthier Guirola-Boe , Simon Launay , Tatiana Borgi , Gabriel Benniks-Chabbert
 * @SyndicSaas 2021-2022
 */

namespace yasmf;

use yasmf\config;
use views\admin\includes\modals\ajout_article;

/**
 * Permet l'upload d'images
 * @package yasmf
 */
class imghelpers
{

	/**
	 * Uploade sur le site une image
	 * @param $nomFichier à ajouter
	 * @param $chemin d'accès
	 * @param $taille de l'image
	 * @param $extension de l'image
	 * @return string|null  true si ajout effectué, false sinon (erreur serveur ou informations non valides)
	 */
	public static function upload_img($nomFichier, $chemin, $taille, $extension)
	{
		$dossier = "images/uploads/";
		$taille_maxi = 10000000;
		$extensions = array('.png', '.gif', '.jpg', '.jpeg');
		//Début des vérifications de sécurité...
		if (!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
		{
			//$erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
?>
			<script>
				alert("Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...");
			</script>

<?php
			//header('Location: /?controller=articlesAdmin&mode=admin');
		}
		if ($taille > $taille_maxi) {
			$erreur = 'Le fichier est trop gros...';
		}
		if (!isset($erreur)) //S'il n'y a pas d'erreur, on upload
		{
			//On formate le nom du fichier ici...
			$nomFichier = strtr(
				$nomFichier,
				'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
				'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy'
			);
			$nomFichier = preg_replace('/([^.a-z0-9]+)/i', '-', $nomFichier);
			if (move_uploaded_file($chemin, $dossier . $nomFichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
			{
				//echo 'Upload effectué avec succès !';
				$nomFichierNew = self::generateName() . $extension;
				rename("images/uploads/" . $nomFichier, "images/uploads/" . $nomFichierNew);
				return $nomFichierNew;
			} else //Sinon (la fonction renvoie FALSE).
			{
				//echo 'Echec de l\'upload !';
				return null;
			}
		} else {
			echo $erreur;
		}
	}


	/**
	 * Génère un nom de fichier aléatoirement (unique) de 8 caractères
	 * @return string nom  généré
	 */
	public static function generateName()
	{
		$carPossibles = "azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN1234567890";
		$nbCarPossibles = strlen($carPossibles) - 1;
		$name = "";
		for ($i = 0; $i < 8; $i++) {
			$pos = mt_rand(0, $nbCarPossibles);
			$name .= $carPossibles[$pos];
		}
		return $name;
	}
}
