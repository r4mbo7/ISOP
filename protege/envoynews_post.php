<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/OTR/xhtml11/DTD/xhtml11.dtd">
<Html xml:lang="fr" dir:"ltr" xmlns="http://www.w3.org/1999/xhtml">
<Head>
<title>Ajouter news</title>
</head>

<body> 
	<?php
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_news', 'lisopfr', 'hRkrKDkDy6');
		}
		catch (Exception $e)
		{
				die('Erreur : ' . $e->getMessage());
		}
		$req = $bdd->prepare('INSERT INTO news(news, titre) VALUES(:news, :titre)');
		$req->execute(array(
			'news' => $_POST['news'],
			'titre'=> $_POST['titre']
			));
		echo 'Ok<BR/><a href="../news/news.php">Page des news</a><BR/><a href="../index.php">Accueil</a><BR/><a href="../forum/index_forum.php">Forum</a><BR/><a href="validation_news.php">Validation news</a><BR /><a href="index.php">Retour</a>';
	?>
</body>
</html>