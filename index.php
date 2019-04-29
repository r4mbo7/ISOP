<?php
	session_start();
	try
	{
		$ban = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
	}
	catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}
	$ip = $_SERVER['REMOTE_ADDR'];
	$test=$ban->query("SELECT ip, motif FROM banis WHERE ip='$ip'");
	$reponce=$test->fetch();
	if(!$reponce)
	{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/OTR/xhtml11/DTD/xhtml11.dtd">
<Html xml:lang="fr" dir:"ltr" xmlns="http://www.w3.org/1999/xhtml">
<Head>
	<link rel="shortcut icon" type="image/x-icon" href="images/Logo2.ico" />
	<meta name="Author" content="Constantin DE LA ROCHE" /> 
	<meta name="decription" content="ISOP, le site entre lycéens de Jean-Gi, forum, news et vote."> 
	<meta http-equiv="Content-Type" content="text/html" /> 
	<meta name="keywords" content="isop, ISOP, lisop, jean-gi, jean-giraudoux, lycée, lycéens, forum, news, vote" /> 
<title>Bienvenue sur ISOP! Le site pour les lycéens de Jean-Gi.</title>
<style type="text/css">
body
{
	background-image: url(images/fond_accueil.png); 
	background-repeat: no-repeat;
	background-color: #FFFFFF;
}
#pub
{
	height: 100px; 
	width: 98%;
	min-width:700px;
	max-width:1300px;
	border: 1px solid black;
	background-image: url(images/banniere_index.png);
	color: green;
	overflow:hidden;
}
#pub strong
{
	color:blue;
}
#pub i
{
	color:red;
}
#pub u
{
	color:black;
}
.stats
{
	border-left: 5px ridge red;
}
#menu
{
	position:absolute;
	top: 200px;
	margin-left: 80px;
	width: 200px;
}
.sous_menu
{
	border: 1px solid green;
	background-color: #00003D;
	margin-bottom: 10px;
	text-align: center;
}
.sous_menu:hover
{
	border: 1px solid red;
	background-color: #A7D0DE;
}
.sous_menu a
{
	color: #ffffff;
	font-size: 30px;
}
.sous_menu a:hover
{
	color: #000000;
	background-color: #A7D0DE;
}
#texte
{
	position:absolute;
	top: 275px;
	left: 400px;;
	min-width:300px;
	max-width:800px;
}
#texte h2
{
	color:red;
}
#texte p
{
	color:blue;
}
#texte a
{
	color:blue;
	text-decoration: none;
}
#texte a:hover
{
	color: red;
}
#heure 
{
	margin-top: 50px;
	text-align:center;
}
#heure a
{
	color:red;
	text-decoration: none;
}
#heure a:hover
{
	color:blue;
}
.deco
{
	font-size:13px;
}
#bas
{
	position: absolute;
	bottom: 5px;
	left: 5px;
	width: 200px;
	border: 1px solid orange;
}
#bas:hover
{
	background-color: black;
	color: #FFFFFF
}
#bas a
{
	text-decoration: none;
	color: #0000FF;
}
#admin
{
	position: absolute;
	bottom: 5px;
	right: 5px;
	width: 150px;
}
</style>
<SCRIPT LANGUAGE="JScript">
function OpenCenterPopUp(){	
	var Left=window.screen.width/2-175;
	var Top=window.screen.height/2-175;
	var Configuration="'toolbar=no, menubar=no, location=no, directories=no, status=no, resizeable=yes, width=500, height=350, left=" + Left + ", top=" + Top;
	window.open('Mides.php','Mes Idées',Configuration);
}
</SCRIPT> 
</head>
<body>
<!--[if IE]>
	<a href="http://download.mozilla.org/?product=firefox-3.6.13&os=win&lang=fr">Pour obtimiser les capacitées du site téléchrage firefox</a>
<![endif]-->
<div id="pub">
	<?php 
	include("bandeau_index.php");
	$adm = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
	?>
</div>
<Div  id="menu">
	<div class="sous_menu">
	<a href="news/news.php"> - News - </a> </div>
	<div class="sous_menu">
	<a href="forum/index_forum.php"> - Forum - </a> </div>
	<div class="sous_menu">
	<a href="Categos.php"> - Vote - </a> </div>
<div id="heure">
	<?php
	$heure= date('H');
	$minute= date('i');
	echo $heure.'h'.$minute.'<br />';
	if(empty($_SESSION['prenom'])) {
	echo '<a href="connection1.php?index=1">Connexion/Inscription</a>';
	}	 
	else{
	$prenom = $_SESSION['prenom'];
	$nb_mp=$adm->query("SELECT COUNT(*) AS 'id' FROM MP WHERE destinataire='$prenom' AND vue=0 ");
	$mp=$nb_mp->fetch();
	echo 'Bonjour '.$_SESSION['prenom'].'<BR />';
	if($mp['id'] == 0)
	{
	echo "<i><a href='LECMP.php'>Messages</a></i><BR />";
	}
	else
	{
	echo "<i><a href='LECMP.php'>Messages (" .$mp['id'] .")</a></i><BR />";
	}
	echo '<a href="deconnexion.php" class="deco">Deconnexion</a>';}
	?>
</div>
</div>
<Div id="texte">
	
	<h2>Bienvenue sur ISOP!</h2>
	<BR />
	<p><?php echo htmlentities("Le site pour les lycéens de Jean-Gi.")?>
	Il offre des <a href="news/news.php">news</a>, un <a href="forum/index_forum.php">forum</a>, un <a href="Categos.php">vote</a> 
	<?php 
	echo htmlentities("entre lycéens") .", des <a href='prog/index.php'>programmes pour TI</a>, etc..." .htmlentities("On espère que tous les lycéens nous rejoindront très vite!");
	?></p>
</div>
<Div id="bas" onclick="OpenCenterPopUp()" target>
	<a href="Mides.php">Nous envoyer un message</a>
</div>
<Div id="contacte">
	<a href="contacte.php"></a>
</div>
<?php
$prenom = $_SESSION['prenom'];
$ver = $adm->query("SELECT adm FROM membre WHERE prenom = '$prenom'");
$modo = $ver->fetch();
if($modo['adm'] == 2 OR $modo['adm'] == 3)
{
?>
<div id="admin">
	<a href="protege/index.php">Zone admin</a>
</div>
<?php
}
else
{
	echo "";
}
if ($_SESSION['connect'] != 1)
{
try
{
	$vbdd = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
}
catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}
$vbdd->exec("UPDATE compteur_visite SET nb_visiteur = nb_visiteur+1 WHERE id=1 ");
$_SESSION['connect'] = 1;
}
else 
{}
}
else
{
	echo "Cette ip a était banni. <br />Motif : " .htmlentities($reponce['motif']);
}
?>
</body>
</html>