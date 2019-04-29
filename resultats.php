		<SCRIPT LANGUAGE="JScript">
		function cool(){	
			var Left=window.screen.width/2-175;
			var Top=window.screen.height/2-175;
			var Configuration="'toolbar=no, menubar=no, location=no, directories=no, status=no, resizeable=yes, width=350, height=350, left=" + Left + ", top=" + Top;
			window.open('cool.php','Cool',Configuration);
		}
		function sexy(){	
			var Left=window.screen.width/2-175;
			var Top=window.screen.height/2-175;
			var Configuration="'toolbar=no, menubar=no, location=no, directories=no, status=no, resizeable=yes, width=350, height=350, left=" + Left + ", top=" + Top;
			window.open('sexy.php','Sexy',Configuration);
		}
		function sape(){	
			var Left=window.screen.width/2-175;
			var Top=window.screen.height/2-175;
			var Configuration="'toolbar=no, menubar=no, location=no, directories=no, status=no, resizeable=yes, width=350, height=350, left=" + Left + ", top=" + Top;
			window.open('sape.php','Sape',Configuration);
		}
		function dejante(){	
			var Left=window.screen.width/2-175;
			var Top=window.screen.height/2-175;
			var Configuration="'toolbar=no, menubar=no, location=no, directories=no, status=no, resizeable=yes, width=350, height=350, left=" + Left + ", top=" + Top;
			window.open('dejante.php','Dejantes',Configuration);
		}
		</SCRIPT>
<div class="result_1" onclick="cool()">
	Les plus <strong>cools</strong>:
	<?php
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
		}
		catch(Exception $e)
		{
				die('Erreur : '.$e->getMessage());
		}
		$reponse = $bdd->query('SELECT prenom, cool FROM membre ORDER BY cool DESC LIMIT 0, 2');
		while ($donnees = $reponse->fetch())
		{
			echo ' '.htmlspecialchars($donnees['prenom']) . '! ('. htmlspecialchars($donnees['cool']) .' voix)';
		}

		$reponse->closeCursor(); ?>
</div>
	<div class="result_2" onclick="sexy()">
les plus <strong>sexy</strong>: 
	<?php
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
		}
		catch(Exception $e)
		{
				die('Erreur : '.$e->getMessage());
		}
		$reponse = $bdd->query('SELECT prenom, sexy FROM membre ORDER BY sexy DESC LIMIT 0, 2');
		while ($donnees = $reponse->fetch())
		{
			echo ' '.htmlspecialchars($donnees['prenom']) . '! ('. htmlspecialchars($donnees['sexy']) .' voix)';
		}

		$reponse->closeCursor(); ?>
</div>
	<div class="result_3" onclick="sape()">
Les plus <strong>classe</strong>: 
	<?php
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
		}
		catch(Exception $e)
		{
				die('Erreur : '.$e->getMessage());
		}
		$reponse = $bdd->query('SELECT prenom, sape FROM membre ORDER BY sape DESC LIMIT 0, 2');
		while ($donnees = $reponse->fetch())
		{
			echo ' '.htmlspecialchars($donnees['prenom']) . '! ('. htmlspecialchars($donnees['sape']) .' voix)';
		}

		$reponse->closeCursor(); ?>
</div>
	<div class="result_4" onclick="dejante()">
Les plus <strong>déjant&eacutees </strong>: 
	<?php
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
		}
		catch(Exception $e)
		{
				die('Erreur : '.$e->getMessage());
		}
		$reponse = $bdd->query('SELECT prenom, dejante FROM membre ORDER BY dejante DESC LIMIT 0, 2');
		while ($donnees = $reponse->fetch())
		{
			echo ' '.htmlspecialchars($donnees['prenom']) . '! ('. htmlspecialchars($donnees['dejante']) .' voix)';
		}
		$reponse->closeCursor(); ?>
</div>