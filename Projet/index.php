<?php
	session_start();
	if($_GET['deco']==1){
		session_unset();
		session_destroy();
	}
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
body
{	
	background-color:#FFFFCC;
}
#tete{
	background-color:#28170B;
	position:absolute;
	top:0px;
	left:0px;
	width:100%;
	height:127px;
	border-bottom: 3px ridge #B3B3B3;
}
#logo{
	margin-top:0px;
	margin-left:10px;
	height:110px;
	width:110px;
}
#co{
	position:absolute;
	top:0px;
	left:199px;
	right:0px;
	text-align:right;
}
#form_co{
	float:right;
	margin-right:21px;
	padding-top:42px;
}
#tab{
}
#cellule{
	color:#ffffff;
	width:42px;
	font-size:17px;
	text-align:left;
}
#sous_cellule{
	text-align:left;
	color:black;
}
#pseudo{
	color:#784421;
}
#mdp{
	text-decoration:none;
	color:#784421;
}
#mdp:hover{
	text-decoration:underline;
}
#corp{
	position:absolute;
	top:127px;
	left:0px;
	width:100%;
	min-height:50%;
}
#l_inscr{
	color:#ffffff;
	background-color:#784421;
	font-size:22px;
	float:right;
	margin-top:8px;
	margin-right:21px;
	text-decoration:none;
	border:2px ridge #ffffff;
	border-radius: 0px 5px; -moz-border-radius: 5px;
}
#l_inscr:hover{
	color:#784421;
	background-color:#ffffff;
	border:2px ridge gray;
}
#titre{
	margin-top:46px;
	margin-left:0px;
	width:100%;
	text-align:center;
}
#t{
	position:relative;
	left: 30%;
	width:40%;
	min-width:350px;
	height:59px;
	padding-top:8px;
	padding-bottom:8px;
	color:#f4e3d7;
	background-color:#28170B;
	border: 2px ridge #f4e3d7;
	border-radius: 10px 10px; -moz-border-radius: 10px;
	font-size:42px;
	letter-spacing:1em;
}
#text{
	margin-top:59px;
	margin-left:5%;
	width:90%;
	font-size:17px;
}
#field{
	
	border-radius: 0px 10px; -moz-border-radius: 10px;
}
#leg{
	color:#A05A2C;
}
#field p{
	padding:30px;
	color:#A05A2C;
}
</style>
</head>
<body>
<div id="tete">
	<div id="logo">
		<img src="images/logo.png" height="127"/>
	</div>
	<div id="co">
		<form action="connexion.php" method="post" id="form_co">
		<table id="tab">
			<tr>
				<td id="cellule"><label for="pseudo">Pseudo</label></td><td  id="cellule"><label for="pass">Mot de passe</label></td><td></td>
			</tr>
			<tr>
				<td  id="cellule"><input type="text" name="pseudo" id="pseudo" <?php if(isset($_COOKIE['Pseud'])){echo "value='" .$_COOKIE['Pseud'] ."'";} ?> ></td>
				<td><input type="password" name="pass" <?php if(isset($_COOKIE['Mdp'])){echo "value='" .$_COOKIE['Mdp'] ."'";} ?> ></td>
				<td  id="cellule"><input type="submit" value="Connexion" /></td>
			</tr>
			<tr>
				<td id="sous_cellule"><input type="checkbox" value="1" name="souvenir"/><label for="souvenir" id="mdp">Se souvenir de moi</label></td><td id="sous_cellule"><a id="mdp" href="">Mot de passe oublié?</a></td>
			</tr>
		</table>
		</form>
	</div>
</div>

<div id="corp">
	<a href="inscription.php" id="l_inscr">S'inscrire</a>
		<div id="titre">
			<h1 id="t">TITRE</h1>
		</div>
	<div id="text">
		<fieldset id="field">
			<legend id="leg"><i>Slogant</i></legend>
			<p>
				Texte...<br/>
				Texte...<br/>
				Texte...<br/>
			</p>
		</fieldset>
	</div>
</div>
</body>
</html>