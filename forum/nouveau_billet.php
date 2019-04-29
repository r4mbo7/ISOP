<?php
	session_start ();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
    <head>
        <title>Forum ISOP</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link rel="shortcut icon" type="image/x-icon" href="Logo2.ico" />
		<meta name="decription" content="Site entre lyceen">
		<style type="text/css">
		body
		{
		<?php
		if(empty($_SESSION['theme']) OR $_SESSION['theme']==1)
		{?>
		background-image: url(fond_forum.png);
		<?php 
		}
		else{
		?>
		background-image: url(fond_forum2.png);
		<?php
		}?>
		background-repeat: no-repeat;
		height: 98%;
		width: 98%;		
		}
		#topic
		{
			position:absolute;
			top:100px;
			left:200px;
			width: 70%;
			overflow: hidden;
		}
		</style>
    </head>
        
    <body>
<?php
include('co.php');
include('menu.php');
	$adm = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
	$prenom = $_SESSION['prenom'];
	$ver = $adm->query("SELECT adm FROM membre WHERE prenom = '$prenom'");
	$modo = $ver->fetch();
?>
	<div id="topic">
	<?php 
	if( empty($_SESSION['topic']) OR $_SESSION['topic'] < 2)
	{ 
	?>
			<form action="nouveau_billet_post.php?id=<?php if(empty($_GET['id'])) {echo '1';} else {echo $_GET['id'];}?>" method="post" enctype="multipart/form-data">
			<fieldset>
				<legend>Ajout d'un topic <?php if(empty($_GET['id'])) {echo 'sur le site';} elseif($_GET['id']=='2') {echo 'sur le bahut';} elseif($_GET['id']=='4') {echo 'sur entre-aide';} else {echo 'sur le reste';} ?></legend>
			<label>Le titre (4 lettres minimum, court et pr<?php echo htmlentities("é");?>cis) :</label><br />
			<input type="text" name="titre" autocomplete="off" /><br/>
			<textarea name="contenu" rows="4" cols="75">
			</textarea><br/>
			<label>Image (700x700 pixels max):</label><br/>
			<input type="file" name="image"/><br/>
			<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
			<?php
			if ($modo['adm'] == 3)
				{
				?>
					<input type="radio" name="modo" value="0" id="0" /> <label for="0" checked="checked">Poster normalement</label><br />
					<input type="radio" name="modo" value="1" id="1" /> <label for="2">Masquer mon nom.</label><br />
					<input type="radio" name="modo" value="2" id="2" /> <label for="2">Poster comme Moderateur</label><br />
					<input type="radio" name="modo" value="3" id="3" /> <label for="3">Poster comme Administrateur</label><br />
				<?php
				} 
			else
				{
			?>
					<input type="radio" name="prenom" value="0" id="0" /> <label for="0" checked="checked">Poster normalement</label><br />
					<input type="radio" name="prenom" value="1" id="1" /> <label for="2">Masquer mon nom.</label><br />
			<?php
				}
				?>
			<input type="image" src="icon/envoyer_post.png" title="Poster" />
			</fieldset>
			</form><br />
			<i><?php echo htmlentities("Merci à toi de ne pas intégrer des propos insultants!");?></i>
	<?php
	}
	else
	{
		echo htmlentities("Désolé mais tu ne peux plus poster de tropic pour l'instant... Tu pourras en reposter à ta prochaine connexion.");
	}
	?>
	</div>
	</body>
</html>