<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/OTR/xhtml11/DTD/xhtml11.dtd">
<Html xml:lang="fr" dir:"ltr" xmlns="http://www.w3.org/1999/xhtml">
<Head>
<title>Isop</title>
<link rel="shortcut icon" type="image/x-icon" href="images/Logo2.ico" />
<style type="text/css">
	body 
	{
		background-color: #FFFFFF;
		background-image: url(images/img_fond2.png);
		background-repeat: no-repeat;
	}
	#connexion
	{ 
		 color: #FFFFFF;
		 background-color: #8F006F;
		 height: 25px;
		 width: 20%;
		 min-width: 175px;
		 max-width: 250px;
		 position: absolute;
		 left: 15px;
		 top: 15px;
		 text-align: center;
	}
	#connexion:hover
	{ 
		 color: #A7D0DE;
	}
	#inscription
	{ 
		 color: #FFFFFF;
		 background-color: #8F006F;
		 height: 25px;
		 width: 20%;
		 min-width: 175px;
		 max-width: 250px;
		 position: absolute;
		 left: 15px;
		 top: 45px;
		 text-align: center;
	}
	#inscription:hover
	{ 
		 color: #A7D0DE;
	}
	#resultats
	{
		text-align: center;
		color: #000000;
		Width: 80%;
		max-width: 900px;
		min-width: 700px;
		position: absolute;
		top: 100px;
		left: 175px;
	}
	#resultats a
	{
		margin-top: 10px;
		color: red;
		font-size: 20px;
	}
	#resultats a:hover
	{
		color: blue;
	}
	#resultats h1
	{
		color: red;
	}
	#resultats p
	{
		color: blue;
	}
	#resultats i
	{
		color: green;
	}
	form
	{
		text-align:center;
	}
	#lien a
	{
	color: black;
	text-decoration: none;
	font-size: 15px;
	}
</style>
<SCRIPT LANGUAGE="JScript">
function OpenCenterPopUp(){	
	var Left=window.screen.width/2-175;
	var Top=window.screen.height/2-175;
	var Configuration="'toolbar=no, menubar=no, location=no, directories=no, status=no, resizeable=yes, width=350, height=350, left=" + Left + ", top=" + Top;
	window.open('defi.php','Defi',Configuration);
}
</SCRIPT>
</head>
<Body>
	<?php
	
	if(empty($_SESSION['prenom'])) {
	echo '<a id="connexion" href="connection1.php">Connexion</a><BR />
		<a id="inscription" href="inscription1.php">Inscription</a><BR />';
	}	 
	else{
	echo '<a id="connexion" href="deconnexion.php">Deconnexion</a><BR />';
	}
	?>
	
	<div id="resultats">
	<?php
	
	if ($_SESSION['vote'] == 2)
	{
		echo htmlentities("Merci d'avoir voté") ."<BR /><a href='index.php'>Accueil</a><BR /><a href='news/news.php'>News</a><BR /><a href='forum/index_forum.php'>Forum</a>";
	}
	else
	{
	include("vote.php");
	?>
	<div id="lien">
	<a href="index.php">accueil</a>
	</div>
	<?php
	}
	?>
	</div>
</body>
</html>