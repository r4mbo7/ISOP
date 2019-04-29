<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
$reponse = $bdd->query('SELECT pseudo, message, temps FROM minichat ORDER BY ID DESC LIMIT 0, 5');
while ($donnees = $reponse->fetch())
{
	echo '<p><strong style="color: blue">' . htmlspecialchars($donnees['pseudo']) . '</strong> : ' . stripslashes(htmlspecialchars($donnees['message'])). ' <strong style="color: #C0C0C0; font-size:13px">(' .$donnees['temps'] .')</strong></p>';
}
$reponse->closeCursor();
?>