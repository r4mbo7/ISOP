<?php
	session_start();
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=membre', 'root', '');
	}
	catch (Exeption $e)
	{
		die('Erreur :' .$e->getMessage());
	}
	if(isset($_SESSION['id'])){
	$id=$_SESSION['id'];
	$nb=$bdd->query("SELECT sexe, nb_commentaire FROM membre WHERE id=$id");
	$nb_c=$nb->fetch();
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
body{
	background-color:#FFFFCC;
}
#tete{
	position:absolute;
	top:0px;
	left:0px;
	width:100%;
	height:100px;
}
#titre{
	position:absolute;
	top:0px;
	left:0px;
	width:15%;
	height:100px;
	overflow:hidden;
	text-align:center;
	background-color:#28170B;
}
#t{
	position:relative;
	top:25px;
	font-size:35px;
	text-decoration:none;
	color:#FFFFCC;
}
#t:hover{
	text-decoration:underline;
}
#forum{
	position:absolute;
	top:0px;
	left:15%;
	height:98px;
	width:30%;
	text-indent:15px;
	border-bottom: 2px solid #28170B;
}
#f{
	position:relative;
	top:65px;
	font-family:Neurochrome, fantasy, Times;
	font-size:30px;
	color:#28170B;
}
#l_top{
	position:relative;
	top:65px;
	font-family:fantasy, Times;
	font-size:15px;
	color:#28170B;
	text-decoration:none;
}
#l_top:hover{
	text-decoration:underline;
}
#info{
	position:absolute;
	top:0px;
	right:0px;
	width:20%;
	height:100px;
	color:#28170B;
}
#pseudo{
	font-size:20px;
	text-align:right;
	margin-right:5px;
}
#avatar{
	border-bottom:4px ridge #784421;
	border-left:4px ridge #784421;
}
#corp{
	position:absolute;
	top:150px;
	left:5%;
	width:90%;
	min-width:500px;
}
#menu{
	float:left;
	margin-top:50px;
	min-width:100px;
	max-width:150px;
	width:10%;
	z-index:50;
}
#menu ul li{
	list-style-type:upper-roman;
}
#menu ul li a{
	text-decoration:none;
	color:black;
	z-index:50;
}
#menu ul li a:hover{
	text-decoration:underline;
}
#act{
	position:relative;
	top:10px;
	left:5%;
	width:90%;
	z-index:-10;
}
#rchr{
	position:relative;
	top:40px;
	left:5%;
	width:90%;
	z-index:-10;
}
#form_rchr{
	margin-left:30px;
	z-index:90;
}
#btn_rchr{
	z-index:90;
}
</style>
</head>
<body>
<div id="tete">
	<div id="titre">
		<a href="../Accueil.php" id="t"><b>Titre</b></a>
	</div>
	<div id="forum">
		<b id="f">Forum</b> <a href="forum.php" id="l_top">->accéder aux topics</a>
	</div>
	<?php
		if(isset($_SESSION['id'])){
	?>
	<div id="info">
		<table style="float:right">
				<caption id="pseudo"><b><?php echo $_SESSION['pseudo'];?></b></caption>
			<tr align="right" valign="top">
				<td id="cellule"><u><?php $nb_commentaire=$nb_c['nb_commentaire']; $sexe=$nb_c['sexe']; include("grade.php"); echo $grade?></u><br/>
				<?php echo $nb_c['nb_commentaire'];?> com.<br/><br/>
				MP.</td>
				<td id="cellule"><img src="../images/logo.gif" width="100" id="avatar"/></td>
			</tr>
		</table>
	</div>
	<?php
		}
	?>
</div>
<div id="corp">
	<div id="menu">
		<ul>
			<li><a href="../Accueil.php">Accueil</a></li>
			<li><a href="">News</a></li>
			<li><a href="forum.php">Forum</a></li>
			<li><a href="">Vidéos</a></li>
			<li><a href="">Projets</a></li>
		</ul>
	</div>
	<div id="act">
		<fieldset>
		<legend>Activitées du forum</legend>
			<p>....</p>
		</fieldset>
	</div>
	<div id="rchr">
		<fieldset>
			<legend>Rechercher</legend>
		<form action="" method="post">
			<label for="recherche">Mots clefs :</label><br/>
				<input type="text" name="recherche" title="Recherche" id="form_rchr"><br/><br/>
			<input type="submit" value="Rechercher" id="btn_rchr"/>
		</form>
		</fieldset>
	</div>
</div>
</body>
</html>