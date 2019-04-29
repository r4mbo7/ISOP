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
#tab_1{
	width:100%;
}
#caption{
	background-color:#28170B;
	color:#FFFFCC;
	text-indent:30px;
}
#ligne_un{
	background-color:#28170B;
	color:#FFFFCC;
	text-indent:30px;
}
#t_sujet{
	width:15%;
}
#sujet{
	text-align:center;
}
#dern_msg{
	width:35%;
	color:#784421;
}
#l_section{
	text-decoration:none;
	color:#28170B;
}
#l_section:hover{
	text-decoration:underline;
}
#tab_suv{
	width:100%;
	margin-top:20px;
}
</style>
</head>
<body>
<div id="tete">
	<div id="titre">
		<a href="../Accueil.php" id="t"><b>Titre</b></a>
	</div>
	<div id="forum">
		<b id="f">Forum</b> <a href="index.php" id="l_top">->accueil forum</a>
	</div>
	<?php
		if(isset($_SESSION['id'])){
	?>
	<div id="info">
		<table style="float:right">
				<caption id="pseudo"><b><?php echo $_SESSION['pseudo'];?></b></caption>
			<tr align="right" valign="top">
				<td id="cellule"><u><?php $nb_commentaire=$nb_c['nb_commentaire']; $sexe=$nb_c['sexe']; include("grade.php"); echo $grade;?></u><br/>
				<?php echo $nb_commentaire;?> com.<br/><br/>
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
	<?php 
		if(!isset($_GET['type'])){
	?>
	<table id="tab_1">
			<caption id="caption">Informatique</caption>
		<tr id="ligne_un">
			<td id="section">Section</td><td id="t_sujet">Sujets</td><td id="t_sujet">Messages</td><td id="t_dern_msg">Dernier message</td>
		</tr>
		<tr>
			<td id="section"><a href="forum.php?type=1" id="l_section">Codage</a></td><td id="sujet">Sujet</td><td id="sujet">Messages</td><td id="dern_msg">Dernier message</td>
		</tr>
		<tr>
			<td id="section"><a href="forum.php?type=2" id="l_section">Graphisme</a></td><td id="sujet">Sujet</td><td id="sujet">Messages</td><td id="dern_msg">Dernier message</td>
		</tr>
		<tr>
			<td id="section"><a href="forum.php?type=3" id="l_section">Idées</a></td><td id="sujet">Sujet</td><td id="sujet">Messages</td><td id="dern_msg">Dernier message</td>
		</tr>
	</table>
	<table id="tab_suv">
			<caption id="caption">Robotique</caption>
		<tr id="ligne_un">
			<td id="section">Section</td><td id="t_sujet">Sujets</td><td id="t_sujet">Messages</td><td id="t_dern_msg">Dernier message</td>
		</tr>
		<tr>
			<td id="section"><a href="forum.php?type=4" id="l_section">Mécanique</a></td><td id="sujet">Sujet</td><td id="sujet">Messages</td><td id="dern_msg">Dernier message</td>
		</tr>
		<tr>
			<td id="section"><a href="forum.php?type=5" id="l_section">Elèctonique</a></td><td id="sujet">Sujet</td><td id="sujet">Messages</td><td id="dern_msg">Dernier message</td>
		</tr>
		<tr>
			<td id="section"><a href="forum.php?type=6" id="l_section">Idées</a></td><td id="sujet">Sujet</td><td id="sujet">Messages</td><td id="dern_msg">Dernier message</td>
		</tr>
	</table>
	<table id="tab_suv">
			<caption id="caption">Scientifique</caption>
		<tr id="ligne_un">
			<td id="section">Section</td><td id="t_sujet">Sujets</td><td id="t_sujet">Messages</td><td id="t_dern_msg">Dernier message</td>
		</tr>
		<tr>
			<td id="section"><a href="forum.php?type=7" id="l_section">Mathématique</a></td><td id="sujet">Sujet</td><td id="sujet">Messages</td><td id="dern_msg">Dernier message</td>
		</tr>
		<tr>
			<td id="section"><a href="forum.php?type=8" id="l_section">Physique/Chimique</a></td><td id="sujet">Sujet</td><td id="sujet">Messages</td><td id="dern_msg">Dernier message</td>
		</tr>
		<tr>
			<td id="section"><a href="forum.php?type=9" id="l_section">Idées</a></td><td id="sujet">Sujet</td><td id="sujet">Messages</td><td id="dern_msg">Dernier message</td>
		</tr>
	</table>
	<table id="tab_suv">
			<caption id="caption">Divers</caption>
		<tr id="ligne_un">
			<td id="section">Section</td><td id="t_sujet">Sujets</td><td id="t_sujet">Messages</td><td id="t_dern_msg">Dernier message</td>
		</tr>
		<tr>
			<td id="section"><a href="forum.php?type=10" id="l_section">Sport</a></td><td id="sujet">Sujet</td><td id="sujet">Messages</td><td id="dern_msg">Dernier message</td>
		</tr>
		<tr>
			<td id="section"><a href="forum.php?type=11" id="l_section">Phylosophique/Politique</a></td><td id="sujet">Sujet</td><td id="sujet">Messages</td><td id="dern_msg">Dernier message</td>
		</tr>
		<tr>
			<td id="section"><a href="forum.php?type=12" id="l_section">Music</a></td><td id="sujet">Sujet</td><td id="sujet">Messages</td><td id="dern_msg">Dernier message</td>
		</tr>
		<tr>
			<td id="section"><a href="forum.php?type=13" id="l_section">Mode</a></td><td id="sujet">Sujet</td><td id="sujet">Messages</td><td id="dern_msg">Dernier message</td>
		</tr>
		<tr>
			<td id="section"><a href="forum.php?type=14" id="l_section">Idées</a></td><td id="sujet">Sujet</td><td id="sujet">Messages</td><td id="dern_msg">Dernier message</td>
		</tr>
	</table>
	<?php
		}
		else{
	?>
		<table id="tab_1">
			<caption id="caption">
		<?php
			switch($_GET['type']){
				
				case 1:
				echo "Codage";
				break;
				
				case 2:
				echo "Graphisme";
				break;
				
				case 3:
				echo "Idées informatique";
				break;
				
				case 4:
				echo "Mécanique";
				break;
				
				case 5:
				echo "Eléctronique";
				break;
				
				case 6:
				echo "Idées de robot";
				break;
				
				case 7:
				echo "Mathématique";
				break;
				
				case 8:
				echo "Physique/Chimique";
				break;
				
				case 9:
				echo "Idées";
				break;
				
				case 10:
				echo "Sport";
				break;
				
				case 11:
				echo "Phylosophique/Politique";
				break;
				
				case 12:
				echo "Music";
				break;
				
				case 13:
				echo "Mode";
				break;
				
				case 14:
				echo "Idées divérses";
				break;
				
				default:
				echo "...";
			}
		?>
			</caption>
		<tr id="ligne_un">
			<td id="section">Sujet</td><td id="t_sujet">Messages</td><td id="t_sujet">Vue</td><td id="t_dern_msg">Dernier message</td>
		</tr>
		<?php
			$type=$_GET['type'];
		
		?>
		<tr>
			<td id="section"><a href="sujet.php?id=x" id="l_section">Codage</a></td><td id="sujet">Messages</td><td id="sujet">Vue</td><td id="dern_msg">Dernier message</td>
		</tr>
		<?php
		
		?>
	</table>
	<?php
		}
	?>
</div>
</body>
</html>