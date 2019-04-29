<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/OTR/xhtml11/DTD/xhtml11.dtd">
<Html xml:lang="fr" dir:"ltr" xmlns="http://www.w3.org/1999/xhtml">
	<Head>
		<title>Isop</title>
		<meta name="Author" content="Gauthier JOLLY" />
		<meta name="author" content="Constantin De La Roche" />
		<style type="text/css">
		p
		{
			color: #ffffff;
			background-color: #000000; 
		}
		</style>
	</head>
	<body style="background-color:#000000"> 
		<p>
			Si tu souhaites nous dire un mot :</br>
		</p>
		<form method="post" action="Mides_post.php">
		<p>
		
		<?php
		if(isset($_SESSION['prenom']))
		{
			echo " ";
		}
		else
		{
		?>
					Nom:<br />
					<input type="text" name="nom" /> <br />
		<?php
		}
		?>
			Message:<br />
			<textarea name="message" rows="8" cols="45">
			</textarea>
			<div id="bouton">
				<input type="submit" value="Envoyer" />
			</div>
		</p>
		</form>
	</body>
</html>