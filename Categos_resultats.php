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
	#resul 
	{
		position:absolute;
		top: 100px;
		left: 75px;
		text-decoration: blink;
	}
	#resultats
	{
		text-align: center;
		color: #000000;
		width: 95%;
		max-width: 1200px;
		min-width: 1000px;
		overflow: hidden;
		position: absolute;
		top: 200px;
		left: 20px;
	}
	.result_1
	{
		background-color: #C6ECF5;
		text-align: center;
		color: blue;
		height: 25px;
		border: 3px solid blue;
		margin-top: 15px;
		margin-bottom: 30px;
		margin-left: 250px;
		margin-right: 275px;
	}
	.result_2
	{
		background-color:#F3D3E0;
		text-align: center;
		color: #FF0066;
		height: 25px;
		border: 3px solid #FFA3B1;
		margin-left: 250px;
		margin-right: 275px;
		margin-bottom: 30px;
	}
	.result_3
	{
		background-color:#DD55FF;
		text-align: center;
		color: #4400AA;
		height: 25px;
		border: 3px solid #4400AA;
		margin-left: 250px;
		margin-right: 275px;
		margin-bottom: 30px;
	}
	.result_4
	{
		background-color: #FFA9A9;
		text-align: center;
		color: red;
		height: 25px;
		border: 3px solid red;
		margin-left: 250px;
		margin-right: 275px;
		margin-bottom: 30px;
	}
	#vote
	{
		margin-top: 10px;
		background-image: url(images/fond_sujet.png);
		text-align: center;
		position: absolute;
		top: 500px;
		width: 300px;
		border: 5px ridge red;
		margin-left: 10%;
		margin-right: 10%;
	}
	#vote:hover
	{
		border: 5px ridge blue;
	}
	#vote a
	{
		color: black;
	}
	#vote a:hover
	{
		color: blue;
	}
	form
	{
		text-align:center;
	}
	#chat
	{
		background-color: #FFFFFF;
		border: 5px ridge #00D400;
		position: absolute;
		top: 300px;
		left: 975px;
		width: 250px;
		overflow: hidden;
	}
	#chat a
	{
		color: black;
	}
	#chat a:hover
	{
		color: blue;
	}

	#chat:hover
	{
		border: 5px ridge blue;
	}
	#chat label
	{

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
	echo '<a id="connexion" href="connection1.php">Connection</a><BR />
		<a id="inscription" href="inscription1.html">Inscription</a></br>';
	}	 
	else{
	echo '<a id="connexion" href="deconnexion.php">Deconnection</a><BR />';
	}
?>
<div id="resul">
	<h2><font size="7" face="Blackadder ITC,Arial">Résultats:</font></h2>
</div>
	<div id="resultats">
	<?php include("resultats.php"); ?>
	</div>
<div id="vote">
	<?php
	if(empty($_SESSION['prenom'])) {
	echo '<a href="connection1.php">Connecte toi et vote!</a>';
	}	 
	else{
	echo '
	<h2><font size="4" face="Lucida Handwriting"><a href="vote/sujet1.php">Toi aussi vote!</a> ;)</font></h2>
	<ul class="defis">
		<a href="Categos.php" onclick="OpenCenterPopUp()" target>Aide nous!</a>
	</ul>';}
	?>
</div>
	<div id="chat">
    <form action="minichat_post.php" method="post">
        <p>
        <label for="pseudo">Statut</label> : <?php 	if(empty($_SESSION['prenom'])) {echo 'Visiteur(non connect&eacute)';}	else {echo $_SESSION['prenom'];}?><br />
        <label for="message">Message</label> :  <input type="text" name="message" id="message" /><br />
		<?php $heure= date('H');
		$minute= date('i');
		$temps= $heure.'h'.$minute;  echo $temps?>
        <input type="submit" value="Envoyer" />
	</p>
    </form>
<?php
	include("minichat.php");
?>
	<a href="Categos.php">actualiser le tchat.</a>
	</div>
</body>
</html>