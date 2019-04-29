<?php
	session_start();
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=membre', 'root', '');
		$bddf = new PDO('mysql:host=localhost;dbname=forum', 'root', '');
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
#m_pseudo{
	font-size:20px;
	text-align:right;
	margin-right:5px;
}
#m_avatar{
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
#tab_com{
	width:100%;
	border-collapse:collapse;
}
#sujet{
	background-color:#28170B;
	color:#FFFFCC;
	margin-bottom:10px;
}
#ligne{
}
#info_auteur{
	border-top:1px solid #28170B;
	width:15%;
}
#pseudo{
	color:#28170B;
	text-decoration:none;
}
#pseudo:hover{
	text-decoration:underline;
}
#message{
	border-top:1px solid #28170B;
}
#rep{
	float:left;
	width:100%;
	background-color:#28170B;
	color:#FFFFCC;
}
#sign{
	border-top:1px dotted #28170B;
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
				<caption id="m_pseudo"><b><?php echo $_SESSION['pseudo'];?></b></caption>
			<tr align="right" valign="top">
				<td id="cellule"><u><?php $nb_commentaire=$nb_c['nb_commentaire']; $sexe=$nb_c['sexe']; include("grade.php"); echo $grade?></u><br/>
				<?php echo $nb_c['nb_commentaire'];?> com.<br/><br/>
				MP.</td>
				<td id="cellule"><img src="../images/logo.gif" width="100" id="m_avatar"/></td>
			</tr>
		</table>
	</div>
	<?php
		}
	?>
</div>
<div id="corp">
	<table id="tab_com">
		<caption id="sujet">Sujet</caption>

		<tr id="ligne">
		
			<td id="info_auteur" align="left" valign="top">
			<a href="" id="pseudo"><b>Pseudo</b></a><br/>
			<i>Statut</i><br/>
			<img src="../images/logo.gif" width="100" id="avatar"/><br/>
			<span>Message : X</span><br/><br/>
			</td>
			
			<td id="message" align="left" valign="top">
			<div id="rep">[Date]</div>
			<p>Message</p>
			<div id="sign">Signature</div>
			<br/>
			</td>
			
		</tr>
		<tr id="ligne">
		
			<td id="info_auteur" align="left" valign="top">
			<a href="" id="pseudo"><b>Pseudo</b></a><br/>
			<i>Statut</i><br/>
			<img src="../images/logo.gif" width="100" id="avatar"/><br/>
			<span>Message : X</span><br/><br/>
			</td>
			
			<td id="message" align="left" valign="top">
			<div id="rep">[Date]</div>
			<p>Message</p>
			<div id="sign">Signature</div>
			<br/>
			</td>
			
		</tr>
	</table>
</div>
</body>
</html>