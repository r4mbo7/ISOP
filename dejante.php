<style type="text/css">
body
{
	background-color: #FFA9A9;
}
</style>
<body>
<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Récupération des 15 derniers messages
$reponse = $bdd->query('SELECT prenom, dejante FROM membre ORDER BY dejante DESC LIMIT 0, 15');

// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
while ($donnees = $reponse->fetch())
{
	echo '<p><strong>' . htmlspecialchars($donnees['prenom']) . '</strong> :'. htmlspecialchars($donnees['dejante']) .' voix </p>';
}

$reponse->closeCursor();

?>
</body>