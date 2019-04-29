<style type="text/css">
#menu
{
	position: absolute;
	top: 75px;
	left: 25px;
	border: 1px solid blue;
	min-width: 250px;
	max-width: 300px;
	color: blue;
	background-color: #EDEFF4;
	font-size: 20px;
	overflow:hidden;
}
#menu a
{
	color:blue;
}
#menu ul.niveau1 li.sousmenu
{
	width: 150px;
}
#menu ul.niveau1 li.sousmenu a
{
	text-decoration:none;
}
#menu ul.niveau1 li.sousmenu ul.niveau2
{
	width: 200px;
}
#menu ul ul 
{  
    display: none;
} 
#menu ul.niveau1 li.sousmenu:hover ul.niveau2
{ 
    display: block; 
}
#menu ul.niveau1 li.sousmenu ul.niveau2 a:hover
{
	color: red;
}
#menu .lien 
{
	text-align:center
}
#menu u
{
	color:black;
}
#menu i:hover
{
	color:red;
}
</style>
<div id="menu">
	<ul class="niveau1">
		<li class="sousmenu">
		
			<a href="news.php">News ISOP</a>
			
			<ul class="niveau2">
					<?php
					try
					{
					$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_news', 'lisopfr', 'hRkrKDkDy6');
					}
					catch(Exception $e)
					{
					die('Erreur : '.$e->getMessage());
					}
					$reponse = $bdd->query('SELECT id, titre FROM news ORDER BY ID DESC LIMIT 0,5 ');
					while ($donnees = $reponse->fetch())	
					{
					?>
					<li><a href="titre1.php?id=<?php echo $donnees['id'];?>"><?php echo htmlentities(stripslashes($donnees['titre']));?></a></li>
					<?php
					}
					$reponse->closeCursor();
					?>
			</ul>
		</li>
		
		<li class="sousmenu">
		
			<a href="exp_lb.php">News libre</a>
			
			<ul class="niveau2">
			
					<?php
					try
					{
					$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_news', 'lisopfr', 'hRkrKDkDy6');
					}
					catch(Exception $e)
					{
					die('Erreur : '.$e->getMessage());
					}
					
						$reponse = $bdd->query("SELECT id, titre FROM exp_lb WHERE validation='oui' ORDER BY ID DESC LIMIT 0,20");
						
					while ($donnees = $reponse->fetch())	
					{ 
					?>
					<li><a href="exp_lb2.php?id=<?php echo $donnees['id'];?>"><?php echo htmlentities(stripslashes($donnees['titre'])); ?></a></li>
					
					<?php
					}
					?>
					<a href="expression_lb.php"><u><i>S'exprimer</i></u></a>
			</ul>
		</li>
		
		<li class="sousmenu"><a href="../prog/index.php"><i>TI/jeux</i></a>
		
		</li>
	</ul>
	<div class="lien">
	<a href="../index.php">Accueil</a> - 
	<a href="../forum/index_forum.php">Forum</a>
	</div>
</div>
