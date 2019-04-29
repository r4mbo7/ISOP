<style type="text/css">
body
{
	background-color: #F3D3E0;
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
$reponse = $bdd->query('SELECT prenom, sexy FROM membre ORDER BY sexy DESC LIMIT 0, 15');

// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
while ($donnees = $reponse->fetch())
{
	echo '<p><strong>' . htmlspecialchars($donnees['prenom']) . '</strong>  :'. htmlspecialchars($donnees['sexy']) .' voix </p>';
}

$reponse->closeCursor();

?>
</body>