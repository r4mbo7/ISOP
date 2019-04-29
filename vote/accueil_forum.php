<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/OTR/xhtml11/DTD/xhtml11.dtd">
<Html xml:lang="fr" dir:"ltr" xmlns="http://www.w3.org/1999/xhtml">
<Head>
	<meta name="keywords" content="vote; jean-gi; jean-giraudoux; chateauroux; lycee" />
	<link rel="shortcut icon" type="image/x-icon" href="Logo2.ico" />
	<meta name="decription" content="Site entre lyceen">
<title>Forum ISOP</title>
	<style type="text/css">
	body
	{
		background-image: url(fond_forum.png);
		background-repeat: no-repeat;
		height: 98%;
		width: 98%;
	}
	#co
	{
		position:absolute;
		top:5px;
		right:5px;
		color:blue;
	}
	#topic
	{
		position:absolute;
		top:10%;
		left:15%;
		width: 70%;
		overflow: hidden;
		background-color: #0055D4;
		color: #FFFFFF;
	}
	.ul_topic
	{}
	.titre
	{
		margin-top: 10px;
		margin-bottom: 10px;
		margin-left: 5px;
		margin-right: 5px;
		border: 2px ridge #00FFFF;
		background-color: #FFFFFF;
		color: #0000AA;
	}
	.titre a
	{
		color:blue;
	}
	.titre a:hover
	{
		color:red;
	}
	#bas
	{
		position:absolute;
		bottom:5px;
		left:45%;
	}
	#bas a:hover
	{
		color:red;
	}
	</style>
</head>
<body>
<div id="co">
	<?php
	if(empty($_SESSION['prenom'])) {
	echo '<a style="color:red" href="connection1.php">Connection</a>';
	}	 
	else{
	echo '<i style="color:red">'.$_SESSION['prenom'].'<BR/> <a href="deconnexion.php">Deconection</a></i>';}
	?>
</div>
<div id="topic">
	<h3>Topic:<h3>
	<ul class="ul_topic">
		<li class="titre">
		De monsieur X <a href="topic.php">Topic 1 : .......................</a> (date)</li>
		<li class="titre">
		De monsieur X <a>Topic 2 : .......................</a> (date)</li>
		</li>
		<li class="titre">
		De monsieur X <a>Topic 10 : .......................</a> (date)</li>
		</li>
	</ul>
</div>
<div id="bas">
<a> 1 </a> <a href="forum_2.php"> 2 </a> <a href="forum_3.php"> 3 </a>
</div>
</body>
</html>