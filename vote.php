<?php	session_start();?>
<h1>Bienvenue!</h1>
<p>Tu es un des premiers sur ISOP, et tu as la chance de pouvoir contribuer!<BR /> 
<?php 
echo htmlentities("Choisit les sujets pour lesquels tu souhaiterais voter. Pour cela il te suffit de cocher dans la liste suivante les differents sujets que tu souhaites.");
echo "<br />";
echo htmlentities("Les 4 sujets ayants le plus de voix seront utilisés  ;)."); 
?></p>
<form method="post" action="vote_post.php">		
			<p>
			<i>
			<input type="checkbox" name="cool" id="case" value="cool" /><label for="cool">Heureux</label><br />
			<input type="checkbox" name="beau" id="case" value="beau"/> <label for="beau">Beau</label><br />
			<input type="checkbox" name="sape" id="case" value="sape"/> <label for="sape"><?php echo htmlentities("Habillé");?></label><br />
			<input type="checkbox" name="dejante" id="case" value="dejante"/> <label for="dejante"><?php echo htmlentities("Dejanté");?></label><br />
			<input type="checkbox" name="simpa" id="case" value="simpa"/> <label for="simpa">Sympas</label><br />
			<input type="checkbox" name="intel" id="case" value="intel"/> <label for="intel">Intelligent </label><br />
			<input type="checkbox" name="seduc" id="case" value="seduc"/> <label for="seduc">Mignon</label><br />
			<input type="checkbox" name="ouf" id="case" value="ouf"/> <label for="ouf">Sadique </label><br />
			</i>
			</p>
	<?php	
	if(empty($_SESSION['prenom'])) {
	echo '<a href="connection1.php">Connecte toi et vote!</a>';	}	 	
	else{
	echo '<input type="submit" value="Voter" />';	}	
	?>
<form>