<?php
	session_start();
	if(!isset($_POST['nom'])){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/OTR/xhtml11/DTD/xhtml11.dtd">
<Html xml:lang="fr" dir:"ltr" xmlns="http://www.w3.org/1999/xhtml">
<Head>
	<link rel="shortcut icon" type="image/x-icon" href="images/Logo2.ico" />
	<meta name="decription" content=""> 
	<meta http-equiv="Content-Type" content="text/html" /> 
	<meta name="keywords" content="" /> 
<title>Titre</title>
<style type="text/css">
body{
	background-color:#FFFFCC;
}
#tete{
	background-color:#28170B;
	position:absolute;
	top:0px;
	left:0px;
	width:100%;
	height:100px;
	text-align:center;	
}
#l_titre{
	text-decoration:none;
	color:#FFFFCC;
}
#l_titre:hover{
	text-decoration:underline;
}
#corp{
	position:absolute;
	top:110px;
	left:25%;
	width:50%;
	color:#28170B;
}
</style>
<script type="text/javascript">
	function verif()
	{
		var err = "";
		if(document.getElementById('nom').value=='')
			err = err+" - Nom\n";
			
		if(document.getElementById('prenom').value=='')
			err = err+" - Prenom\n";
			
		if(document.getElementById('pseudo').value=='')
			err = err+" - Pseudo\n";
		
		if(document.getElementById('pass').value=='')
			err = err+" - Mot de passe\n";
		
		if(document.getElementById('pass2').value=='')
			err = err+" - Confirmation de mot de passe\n";
		
		if(document.getElementById('pass').value!=document.getElementById('pass2').value)
			err = err+" - Les mots de passe sont différent\n";
			
		if(document.getElementById('charte').checked==false)
			err = err+" - Acceptation de la charte\n";
			
		if(err!=""){
			alert("Inscription incorecte :\n"+err);
		}
		else{
			document.getElementById('inscription').submit();
		}
	}
</script>
</head>
<body>
<div id="tete">
	<div id="titre">
		<h1><a href="index.php" id="l_titre">Titre</a></h1>
	</div>
<div>
<div id="corp">
	
	<form action="inscription.php" method="post" id="inscription">
		
		<fieldset>
			<legend>Inscription</legend>
			
			<br>
			<label for="nom">Nom</label><br>
				<input type="text" name="nom" id="nom"/><br><br>
			<label for="prenom">Prenom</label> <?php if(isset($_GET['err']) && $_GET['err']==2){echo "<u style='color:red'>Votre prenom ne peut pas contenir de guillemets double(\").</u>";}?><br>
				<input type="text" name="prenom" id="prenom"/><br><br>
			<label for="pseudo">Pseudo</label> <?php if(isset($_GET['err'])&& $_GET['err']==1){echo "<u style='color:red'>Votre pseudo ne doit pas contenir de guillemets double(\").</u>";}?><br>
				<input type="text" name="pseudo" id="pseudo"/><br><br>
			<label for="pass">Ton mot de passe</label><br>
				<input type="password" name="pass" id="pass" /><br>
			<label for="pass2">Confirmer :</label><br>
				<input type="password" name="pass2" id="pass2" /><br><br>
			<label for="mail">Adresse email :</label><br>
				<input type="text" name="mail" id="mail" /><br><br>
			<label for="age">Age :</label><br>
				<select name="age" id="age">
					<?php
						$c=7;
						while($c<71){
					?>
					<option value="<?php echo $c;?>"><?php echo $c;?></option>
					<?php
						$c++;
						}
					?>
				</select><br><br>
			<label for="sexe">Sexe :</label><br>
				<select name="sexe" id="sexe">
					<option value="Homme">Homme</option>
					<option value="Femme">Femme</option>
				</select><br><br>
			
			<input type="checkbox" name="charte" id="charte" /> <label for="charte">J'ai connaissance et j'accepte les conditions d'utilisation de la charte d'utilisation suivante : <a href="charte.docx" style="color:red">charte</a></label><br><br>
			<input type="button" value="S'inscrire" onClick="verif()"/>
			
		</fieldset>
		
	</form>
</div>
</body>
</html>
<?php
	}
	else{
		
		if(preg_match("#\"#", $_POST['pseudo'])){
			header('Location: inscription.php?err=1');
		}
		elseif(preg_match("#\"#", $_POST['prenom'])){
			header('Location: inscription.php?err=2');
		}
		else{
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=membre', 'root', '');
		}		
		catch(Exception $e)
		{
			die('Erreur : '.$e->getMessage());
		}
		
			$nom=$_POST['nom'];
			$prenom=$_POST['prenom'];
			$pseudo=$_POST['pseudo'];
			$pass=$_POST['pass'];
			$mail=$_POST['mail'];
			$age=$_POST['age'];
			$sexe=$_POST['sexe'];
		
		$bdd->exec("INSERT INTO membre(nom, prenom, pseudo, age, sexe, email, pass, nb_connex) VALUES('$nom', '$prenom', '$pseudo', $age, '$sexe', '$mail', '$pass', 1)");
		
		$if = $bdd->query("SELECT id FROM membre WHERE nom='$nom' AND prenom='$prenom' ORDER BY id DESC");
		$id = $if->fetch();
			
			$_SESSION['id']=$id['id'];
			$_SESSION['nom']=$nom;
			$_SESSION['prenom']=$prenom;
			$_SESSION['pseudo']=$pseudo;
		
		header('Location: Accueil.php');
		}
	}
?>