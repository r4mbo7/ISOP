	<style type="text/css">
	#co
	{
		position:absolute;
		top:5px;
		right:5px;
		color:blue;
		text-align : right;
	}
	a
	{
		color:red;
		text-decoration: none;
	}
	#deconex
	{
		color: blue;
	}
	</style>
<div id="co">
	<?php
	if(empty($_SESSION['prenom'])) {
	echo "<a href='../connection1.php' title='connexion/inscription'>Connexion</a>";
	}	 
	else{
	?>
	
	<a href="forum.php" title="Régles générales du forum"><i><?php echo $_SESSION['prenom']?></a><BR/>
	<a id="deconex" href="deconnexion.php">Deconnexion</a></i>
	
	<?php
	}
	?>
	<br>
	<?php
	if(!empty($_SESSION['prenom']))
	{?>
	<a href="favori_topic.php"><input type="image" src="icon/carnet.png" title="Topics favoris"></a>
	<?php
	}
	else{}
	?>
</div>