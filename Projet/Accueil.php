<?php
	session_start();
	if(!isset($_SESSION['id'])){
		header('Location: index.php');
	}
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=membre', 'root', '');
	}
	catch (Exeption $e)
	{
		die('Erreur :' .$e->getMessage());
	}
	$id=$_SESSION['id'];
	$if=$bdd->query("SELECT * FROM membre WHERE id=$id");
	$info=$if->fetch();
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
	height:150px;
	color:#FFFFCC;
}
#avatar{
	position:absolute;
	top:15px;
	bottom:15px;
	left:15px;
	width:100px;
	overflow:hidden;
}
#info{
	position:absolute;
	top:30px;
	left:130px;
}
#tab_info{
	border-collapse: separate;
	border-spacing: 10px 0px;
}
#tab{
	text-align:left;
}
#prenom{
	color:#CC9966;
	font-size:18px;
}
#deco{
	position:relative;
	left:10px;
	color:#FFFFCC;
	font-size:10px;
	text-decoration:none;
}
#l_mp{
	text-decoration:none;
	color:#FFFFCC;
}
#l_mp:hover{
	text-decoration:underline;
}
#rchr{
	position:relative;
	top:120px;
	left:80%;
	width:20%;
}
#form_rchr{
	color:#784421;
}
#titre{
	float:right;
	font-size:25px;
	margin-top:10px;
	margin-right:10px;
}
#corp{
	position:absolute;
	top:150px;
	left:0px;
	width:100%;
	background-color:#FFFFCC;
	min-height:1000px;
}
#menu{
	position:relative;
	top:100px;
	left:25px;
	min-width:100px;
	max-width:150px;
	width:10%;
}
#menu ul li{
	list-style-type:upper-roman;
}
#menu ul li a{
	text-decoration:none;
	color:black;
}
#menu ul li a:hover{
	text-decoration:underline;
}
#news{
	position:relative;
	top:-100px;
	left:200px;
	width:80%;
}
#forum{
	position:relative;
	top:-50px;
	left:200px;
	width:80%;
}
#projet{
	position:relative;
	left:200px;
	width:80%;
}
#leg{
	color:#28170B;
	text-decoration:none;
}
#leg:hover{
	text-decoration:underline;
}
#tab_mp{
	position:relative;
	top:-100px;
	left:200px;
	width:800px;
}
#caption_mp{
	position:relative;
	font-size:25px;
	color:#28170B;
}
#l_nv_mp{
	font-size:13px;
	color:#784421;
}
#auteur_mp{
	text-align:center;
	width:100px;
	border: 1px solid black;
}
#l_auteur_mp{
	text-decoration:none;
	color:#784421;
}
#l_auteur_mp:hover{
	text-decoration:underline;
}
#objet_mp{
	font-size:13px;
	text-indent:30px;
	width:700px;
	border: 1px solid black;
}
#message{
	width:700px;
	border: 1px solid black;
}
#date{
	font-size:12px;
	color:#784421;
}
#btn_mp{
	float:right;
}
#err{
	color:red;
	position:absolute;
	top:250px;
	left:40%;
	text-align:center;
	border:1px solid red;
	background-color:#FFEBE8;
}
</style>
</head>
<body>
<div id="tete">
	<div id="avatar">
		<img src="images/logo.gif" width="100"/>
	</div>
	<div id="info">
		<table id="tab_info">
			<caption id="tab"><b id="prenom"><?php echo htmlspecialchars(stripslashes($_SESSION['prenom']));?></b><a href="index.php?deco=1" id="deco">deconnexion</a></caption>
			<tr>
				<td id="tab"><?php echo htmlspecialchars(stripslashes($_SESSION['pseudo']));?></td>
				<td id="tab">Statut : <u><?php $nb_commentaire=$info['nb_commentaire']; $sexe=$info['sexe']; include('grade.php'); echo $grade;?></u></td><td></td>
			</tr>
			<tr>
				<td id="tab">Connexions : <?php echo $info['nb_connex'];?></td>
				<td id="tab">Commentaires : <?php echo $info['nb_commentaire'];?></td><td></td>
			</tr>
			<tr>
				<td id="tab">Projet : X</td>
				<td id="tab">Notification : X</td>
				<td id="tab"><a href="Accueil.php?mp" id="l_mp">Messages (X)</a></td>
			</tr>
		</table>
	</div>
	<div id="titre">
		<b>Titre</b>
	</div>
	<div id="rchr">
		<form action="" method="post">
			<input type="text" name="recherche" title="Recherche" id="form_rchr"> 
			<input type="submit" value="Rechercher" id="form_rchr"/>
		</form>
	</div>
</div>
<div id="corp">
	<div id="menu">
		<ul>
			<li><a href="Accueil.php">Accueil</a></li>
			<li><a href="">News</a></li>
			<li><a href="forum/index.php">Forum</a></li>
			<li><a href="">Vidéos</a></li>
			<li><a href="">Projets</a></li>
		</ul>
	</div>
	<?php
																					//Accueil défault
		if(!isset($_GET['mp'])){
	?>
	<div id="news">
		<fieldset>
			<legend><a href="" id="leg">News</a></legend>
			<p>News.....</p>
		</fieldset>
	</div>
	<div id="forum">
		<fieldset>
			<legend><a href="forum/index.php" id="leg">Forum</a></legend>
			<p>Forum...</p>
		</fieldset>
	</div>
	<div id="projet">
		<fieldset>
			<legend><a href="" id="leg">Projets</a></legend>
			<p>Projets...</p>
		</fieldset>
	</div>
	<?php
		}
		else{                                                                    	//Include MP
	?>
		<table id="tab_mp">
			<?php if(empty($_GET['mp'])){?><caption id="caption_mp">Messages <a href="Accueil.php?mp=nouv" id="l_nv_mp">Envoyer un message</a></caption><?php }?>
	<?php
			if(empty($_GET['mp'])){								//Pas de discution selectionné
			$etp=$bdd->query("SELECT *, DATE_FORMAT(date, \"%d/%m/%Y\") AS date_fr FROM mp WHERE id_destinataire=$id OR id_auteur=$id ORDER BY date DESC");
			while($info_auteur=$etp->fetch()){
				$id_auteur=$info_auteur['id_auteur'];
				$nm=$bdd->query("SELECT * FROM membre WHERE id=$id_auteur");
				$if_auteur=$nm->fetch();
	?>	
			<tr>
				<td id="auteur_mp"><a href="Accueil.php?mp=<?php echo $info_auteur['id'];?>" id="l_auteur_mp"><?php echo htmlspecialchars(stripslashes($if_auteur['pseudo']));?></a><br/>
				<span id="date"><?php echo $info_auteur['date_fr'];?></span></td>
				<td id="objet_mp" align="left" valign="top"><p><?php echo htmlspecialchars(stripslashes($info_auteur['objet']));?></p></td>
			</tr>
	<?php		
				}
			}
			elseif($_GET['mp']!="nouv"){							//Discution selectionné
			$id_mp=$_GET['mp'];
			$etp=$bdd->query("SELECT *, DATE_FORMAT(date, \"%d/%m/%Y\") AS date_fr FROM mp2 WHERE id_mp=$id_mp ORDER BY date DESC");
			while($discution=$etp->fetch()){
				$id_auteur=$discution['id_auteur'];
				$nm=$bdd->query("SELECT * FROM membre WHERE id=$id_auteur");
				$info_auteur=$nm->fetch();
	?>
			<tr id="ligne">
				<td id="auteur_mp" align="left" valign="top"><span id="l_auteur_mp"><?php echo htmlspecialchars(stripslashes($info_auteur['pseudo']));?></span><br/>
				<span id="date"><?php echo $discution['date_fr'];?></span></td>
				<td id="message" align="left" valign="top"><p><?php echo htmlspecialchars(stripslashes($discution['message']));?></p></td>
			<tr>
	<?php
			}
	?>
			<tr>
			<form method="post" action="mp.php">
			<input type="hidden" name="id_mp" value="<?php echo $id_mp;?>">
				<td id="auteur_mp" align="left" valign="top"><span id="l_auteur_mp"><?php echo htmlspecialchars(stripslashes($_SESSION['pseudo']));?><span></td>
				<td id="message">
				<label for="reponse"></label>
					<textarea name="reponse" rows="4" cols="70" id="reponse"></textarea>
				<input type="submit" value="Répondre" id="btn_mp"/>
				</td>
			</form>
			</tr>
	<?php
			}
			else{													//Nouveau message
	?>
			<form method="post" action="mp.php">
			<tr>
				<td><label for="pseudo">À :</label></td><td><input type="text" name="pseudo"/></td><br/>
			</tr>
			<tr>
				<td><label for="objet">Objet :</label></td><td><input type="text" name="objet"/></td><br/>
			</tr>
			<tr>
				<td><label for="message">Message :</label></td><td><textarea name="message" rows="2" cols="70"></textarea></td>
			</tr>
			<tr>
				<td><input type="submit" value="Envoyer"/></td><td></td>
			</tr>
			</form>
	<?php
			}
	?>
		</table>
	<?php
		}
	?>
</div>
</body>
</html>