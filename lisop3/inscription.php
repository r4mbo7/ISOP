<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/OTR/xhtml11/DTD/xhtml11.dtd">
<Html xml:lang="fr" dir:"ltr" xmlns="http://www.w3.org/1999/xhtml">
<Head>
	<link rel="shortcut icon" type="image/x-icon" href="images/Logo2.ico" />
	<meta name="Author" content="Constantin DE LA ROCHE" /> 
	<meta name="decription" content="ISOP, le site entre lycéens de Jean-Gi, forum, news et vote."> 
	<meta http-equiv="Content-Type" content="text/html" /> 
	<meta name="keywords" content="isop, ISOP, lisop, jean-gi, jean-giraudoux, lycée, lycéens, forum, news, vote" /> 
<title>Lisop</title>
<style type="text/css">
	body{
		background-color:#CCCCCC;
	}
	#corp{
		border-radius: 10px 10px; -moz-border-radius: 10px;
		width:90%;
		height:1000px;
		padding-top: 25px;
		margin-left:5%;
		background-color:#FFFFFF;
	}
	#contenu{
		margin-left:15%;
		margin-right:5%;
	}
	#contenu h3{
		text-align:center;
		color:#1A1A1A;
	}
</style>
	<script type="text/javascript">
	function verif()
	{
		var err = "";
		if(document.getElementById('prenom').value=='')
			err = err+" - Prenom et nom\n";
			
		if(document.getElementById('pass').value=='')
			err = err+" - Mot de passe\n";
		
		if(document.getElementById('pass2').value=='')
			err = err+" - Confirmation de mot de passe\n";
		
		if(document.getElementById('charte').checked==false)
			err = err+" - Acceptation de la charte\n";
			
		if(err!=""){
			alert("Inscription incorecte :\n"+err);
		}
		else if(confirm("Comfirmer l'inscription ?")){
			document.getElementById('inscription').submit();
		}
	}
	</script>
</head>
<body>
<div id="corp">
	<div id="menu">
		<?php include('menu.php');?>
	</div>
	<div id="contenu">
		<h3>Inscription</h3>
		
		<form action="inscription2.php" method="post" id="inscription">
			<fieldset>
			<legend>Inscription</legend>
			<label for="prenom">Prenom et nom /!\<u>Initials en majuscules</u>, et <u>pas de diminutifs</u>/!\: <?php if($_GET['erreur']==2){echo "<u style='color:red'>Prenom et nom déjà utilisé, contactez les administrateurs</u>";}elseif($_GET['erreur']==3){echo "<u style='color:red'>Entre ton vrai <b>P</b>renom et ton vrai <b>N</b>om et n'oublie pas les Majuscules!</u>";}?></label><br>
				<input type="text" name="prenom" id="prenom"/><br>
			<label for="pass">Ton mot de passe :<?php if($_GET['erreur']==1){echo "<u style='color:red'>Les deux mots de passe ne sont pas identique</u>";}?></label><br>
				<input type="password" name="pass" id="pass" /><br>
			<label for="pass2">Confirmer :</label><br>
				<input type="password" name="pass2" id="pass2" /><br>
			<label for="mail">Adresse email :</label><br>
				<input type="text" name="mail" id="mail" /><br>
			<label for="lycee">Lycée : </label><br>
				<input type="text" name="lycee" id="lycee"/><br>
			<label for="classe">Classe : </label><br>
				<select name="classe" id="classe">
					<option value="2nde">2nde</option>
					<option value="1ere">1ere</option>
					<option value="Term">Term</option>
					<option value="autre">autre</option>
				</select><br>
			<label for="sexe">Sexe : </label><br>
			<select name="sexe" id="sexe">
				<option value="Homme">Homme</option>
				<option value="Femme">Femme</option>
			</select><br>
				<input type="checkbox" name="charte" id="charte" /> <label for="charte"><?php if($_GET['erreur']==4){echo "<u style='color:red'>";}?>J'ai connaissance et j'accepte les conditions d'utilisation de la charte d'utilisation suivante : </u><a href="charte.docx">charte</a></label><br>
				<input type="button" value="S'inscrire" onClick="verif()"/>
			</fieldset>
		</form>
	</div>
</div>
</body>
</html>