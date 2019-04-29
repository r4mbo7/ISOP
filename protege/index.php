<?php	session_start();
	$adm = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
	$prenom = $_SESSION['prenom'];
	$ver = $adm->query("SELECT adm FROM membre WHERE prenom = '$prenom'");
	$modo = $ver->fetch();
	if ( $modo['adm'] == '2' OR $modo['adm'] == '3')
	{
	$new = new PDO('mysql:host=localhost;dbname=lisopfr_news', 'lisopfr', 'hRkrKDkDy6');
	$newsnnv = $new->query("SELECT COUNT(*) AS id FROM exp_lb WHERE validation='non'");
	$nb_news=$newsnnv->fetch();
	
	$prgm = new PDO('mysql:host=localhost;dbname=lisopfr_prog', 'lisopfr', 'hRkrKDkDy6');
	$prog = $prgm->query("SELECT COUNT(*) AS id FROM Ti WHERE validation='non'");
	$nb_prgm = $prog->fetch();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/OTR/xhtml11/DTD/xhtml11.dtd">
<Html xml:lang="fr" dir:"ltr" xmlns="http://www.w3.org/1999/xhtml"><Head>		
<link rel="shortcut icon" type="image/x-icon" href="../images/Logo2.ico" />	
<title>Admin</title>
<style type="text/css">
body
{ 
	background-color: black;
	color: #FFFFFF;
}
a
{ 
	color: green;
}
a:hover
{
	color: red;
}
h1
{
	color: red;
}
#mini_chat
{
	position: absolute;
	top: 150px;
	left: 400px;
	color: #FFFFFF;
}
</style>
</head>
<body>
<h1>ISOP</h1>
<a href="../index.php">Page d'accueil</a><BR /><BR />
<a href="envoynews.php">Publier une news ISOP</a><BR /><BR />
<a href="validation_news.php">Valider des news libres</a> (<?php echo $nb_news['id'] ." news lb a valider";?>)<BR /><BR />
<a href="validation_prog.php">Valider des programmes</a> (<?php echo $nb_prgm['id'] ." programme a valider";?>)<BR /><BR />
<a href="MP.php">Envoyer un Message</a><BR /><BR />
<a href="message_modo.php">Messages des internautes</a><BR /><BR />
<a href="gestion_forum.php">Gerer le forum</a><BR /><BR />
<a href="ban.php">Bannir l'ip d'un membre</a><br /><br />
<a href="btn_rouge.php">Bouton ROUGE</a>
<div id="mini_chat">
<a href="index.php">Tchat:</a><BR />
<form action="minichat_post.php" method="post"> 
<p>        
	Statut: Admin <BR />
	<label for="message">Message</label> :  
	<input type="text" name="message" id="message" />
	<br />		
	<?php
	$heure= date('H');
	$minute= date('i');		
	$temps= $heure.'h'.$minute;  
	echo $temps
	?>        
	<input type="submit" value="Envoyer" />	
	</p>    
	</form>
<?php include("minichat.php");
}
else 
{
}
?>
</div>
</body>
</html>