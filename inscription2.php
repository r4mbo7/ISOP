<?php 
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
		}		
		catch(Exception $e)
		{
				die('Erreur : '.$e->getMessage());
		}
		$prenom=$_POST['prenom'];
		$verif = $bdd->query("SELECT prenom FROM membre WHERE prenom='$prenom' ");
		$prenom2 = $verif->fetch();
		
		if (!isset($_POST['motDePasse1']) OR $_POST['motDePasse1'] != $_POST['motDePasse2'] OR $_POST['motDePasse1'] == '')
		{ 
			header('Location: inscription1.php?faux=1');
		}
		
		elseif ($prenom == $prenom2['prenom'])
		{
			header('Location: inscription1.php?faux=3');
		}
		
		elseif (preg_match("#^[a-z]|[0-9]|[A-Z]{2,5}#", $_POST['prenom']) OR preg_match("#zizi|salope|admin|modo|administrateur|moderateur|modérateur|masqué|pute|connard|cul|bite|isop|lisop|enculé|merde|putin|chaudasse|monsieur|fils#i", $_POST['prenom']))
		{
			header('Location: inscription1.php?faux=2');
		}
		
		else
		{	
			$pass_hache=sha1($_POST['motDePasse1']);
			$req = $bdd->prepare('INSERT INTO membre(prenom, nom, classe, sexe, email, pass, ip, date, nb_connex) VALUE(:prenom, :nom, :classe, :sexe, :email, :pass, :ip, NOW(), 1)');
			$req->execute(array(
			'prenom' => $prenom,
			'nom' => $_POST['nom'],
			'classe' => $_POST['classe'],
			'sexe' => $_POST['sexe'],
			'email' => $_POST['email'],
			'pass' => $pass_hache,
			'ip'=>$_SERVER['REMOTE_ADDR']
			));
			
			$classe=$_POST['classe'];
			
			$destinataire=$_POST['prenom'];
			$auteur="ISOP";
			$mp="Soit le bienvenue sur ISOP, le site communautaire des lyceens de jean-gi ! Si tu as la moindre question n'hésite pas le Forum est à toi ! Les news sont la pour te permette de savoir tous ce qui se passe au bahut en ce moment, tu peut publier les tiennes!";
			$bdd->exec("INSERT INTO MP(auteur, destinataire, MP, time, date) VALUE('$auteur', '$destinataire', '$mp', CURTIME(), CURDATE())");
			
			$bdda = $bdd->query("SELECT id FROM membre WHERE prenom = '$prenom' AND classe = '$classe'");
			$resultat = $bdda->fetch();
			
			session_start();
			$_SESSION['prenom']=$_POST['prenom'];
			$_SESSION['classe']=$_POST['classe'];
			$_SESSION['ip']=$_SERVER['REMOTE_ADDR'];
			$_SESSION['id']=$resultat['id'];
			
			header('Location: index.php');
			$bdd->exec("UPDATE compteur_visite SET nb_membre = nb_membre+1 WHERE id=1 ");
		}
?>