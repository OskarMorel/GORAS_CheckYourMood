<?php

/**
 * imagehelpers.php
 * @CheckYourMood 2022-2023
 */

namespace yasmf;

use yasmf\config;

/**
 * Permet l'upload d'images
 * @package yasmf
 */
class fileshelpers
{

	/**
	 * Uploade sur le site un fichier
	 * @param $nomFichier nom du fichier à ajouter
	 * @param $chemin chemin d'accès
	 * @param $taille taillede l'image
	 * @param $extension extention de l'image
	 * @return string|null  true si ajout effectué, false sinon (erreur serveur ou informations non valides)
	 */
	public static function upload_file($nomFichier, $chemin, $taille, $extension)
	{
		$dossier = "files/";
		$taille_maxi = 10000000000;
		$extensions = array('.png', '.gif', '.jpg', '.jpeg', 'pdf', 'docx', 'doc');
		//Début des vérifications de sécurité...

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
				rename("files/" . $nomFichier, "files/" . $nomFichierNew);
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
