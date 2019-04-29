<?php
	session_start();
	$adm = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
	$prenom = $_SESSION['prenom'];
	$ver = $adm->query("SELECT adm FROM membre WHERE prenom = '$prenom'");
	$modo = $ver->fetch();
	if ( $modo['adm'] == '2' OR $modo['adm'] == '3')
	{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/OTR/xhtml11/DTD/xhtml11.dtd">
<Html xml:lang="fr" dir:"ltr" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Bannissement</title>
	<script type="text/javascript">
	function valid()
	{
	if(document.getElementById('motif').value==''){
		alert('Il faut un motif pour bannir un membre!');
	}
	else{
	
		if(confirm("Bannir ce membre?")){
			document.getElementById('form').submit();
		}
		else{}
	
	}
	}
	</script>
</head>
<body>
		<form id="form" method="post" action="ban_post.php"> 
		
			<label for="victime">Membre a bannir:</label><BR/>
				<select name="victime" id="victime">
				<option value=""></option>
				<?php
				try
				{
					$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
				}
				catch(Exception $e)
				{
						die('Erreur : '.$e->getMessage());
				}
				$reponse = $bdd->query('SELECT prenom FROM membre ORDER BY prenom ASC');
				while ($donnees = $reponse->fetch())
				{ ?>
				<option>
				<?php
				echo $donnees['prenom'];
				?>
				</option>
				<?php
				}
				$reponse->closeCursor();
				?>
				</select> <br />
			<label for="motif">Motif : </label><br />
				<textarea id="motif" name="motif" rows="4" cols="75"></textarea>
				
				<input type="button" value="Bannir" onClick="javascript:valid()" />
		</form>
				<Br/>
</body>
</html>
<?php 
	}
else{}
?>