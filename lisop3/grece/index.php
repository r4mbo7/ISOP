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
		background-image:url(../images/fond.png);
	}
	#tete{
		position:absolute;
		top:0px;
		left:0px;
		width:100%;
		height: 50px;
		background-image:url(../images/lisop.png);
		background-repeat: no-repeat;
		background-color:#000000;
		color: #FFFFFF;
	}
	#menu{
		position:absolute;
		top:16px;
		left:300px;
		border-spacing:10px;
	}
	#l_menu{
		border-radius: 10px 0px; -moz-border-radius: 10px;
		border-top: 2px solid #FFFFFF;
		border-left: 2px solid #FFFFFF;
		width: 75px;
		text-align:center;
		text-indent: 5px;
	}
	#l_menu a{
		color:#FFFFFF;
		text-decoration:none;
	}
	#l_menu a:hover{
		color:#F2F2F2;
		text-decoration:underline;
	}
	#corp{
		width:90%;
		padding-top: 10px;
		min-height:1000px;
		margin-left:5%;
		margin-top: 50px;
		background-color:#FFFFFF;
	}
	#tab_img{
		width:100%;
	}
	#cellule{
		whidth:25%;
	}
	#lien_img{
		text-decoration:none;
		color:#FFFFFF;
	}
	#img{
		width:100px;
		border-radius: 10px 0px; -moz-border-radius: 10px;
		border:1px ridge gray;
	}
</style>
</head>
<body>
<div id="tete">
		<table id="menu">
			<tr>
				<td id="l_menu"><a href="../index.php">Accueil</a></td>
				<td id="l_menu"><a href="../news.php">News</a></td>
				<td id="l_menu"><a href="../forum.php">Forum</a></td>
			</tr>
		</table>
</div>
	<div id="corp">
<table id="tab_img">
	<caption>Voyage en Grèce</caption>
<?php
	try
		{
			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_images', 'lisopfr', 'hRkrKDkDy6', $pdo_options);
		}
		catch(Exception $e)
		{
			die('Erreur : '.$e->getMessage());
		}
	$req=$bdd->query("SELECT * FROM image");
	while($img=$req->fetch()){
	$l++;
	if(($l%4)==0){
		echo "<tr>";
	}
?>	
		<td id="cellule"><a id="lien_img" href="image.php?id=<?php echo $img['id'];?>"><img id="img" alt="image" src="images/<?php echo $img['url'];?>" /></a></td>
<?php
	if(($l%4)==0){
		echo "</tr>";
	}
	
	}
?>
<table/>
<a href="ajout_images.php">Ajouter des images</a>
	</div>
</body>
</html>