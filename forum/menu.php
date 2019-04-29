<style type="text/css">
	<?php
	if(empty($_SESSION['theme']) OR $_SESSION['theme']==1)
	{?>
	#menu	
		{
		background-color:#FFFFFF;
		position:absolute;
		top:100px;
		left:2%;
		width: 11%;
		min-width: 150px;
		max-width: 195px;
		border: 1px solid black;
		padding-top:5px;
		padding-bottom:5px;	
		}	
	#menu ul a	
		{		
		color: #0D0C93;
		text-decoration:none;
		}	
	#menu ul a:hover
		{		
		border-top:1px solid black;		
		border-bottom:1px solid black;		
		font-size:17px;	
		}
	#T2
		{
		color: blue;
		font-size: 10px;
		}
	.lien 
		{
			text-align:center;
		}
	.lien a
		{
			color:black;
			text-decoration: none;
		}
	#chat	
		{		
		position:relative;		
		top: 350px;		
		width: 13%;
		min-width:180px;
		max-width: 195px;
		Border: 2px ridge blue;		
		font-size: 12px;		
		background-color: #FFFFFF;	
		}
	#chat strong
		{
		color: blue;
		}
	<?php
	}
	else { ?>
	#menu	
		{
		background-color:#FFFFFF;
		position:absolute;
		top:100px;
		left:2%;
		width: 11%;
		min-width: 150px;
		max-width: 195px;
		border: 1px solid black;
		padding-top:5px;
		padding-bottom:5px;	
		}	
	#menu ul a	
		{		
		color: #800000;
		text-decoration:none;
		}	
	#menu ul a:hover
		{		
		border-top:1px solid black;		
		border-bottom:1px solid black;		
		font-size:17px;	
		}
	#T2
		{
		color: #FF2A2A;
		font-size: 10px;
		}
	.lien 
		{
			text-align:center;
		}
	.lien a
		{
			color:black;
			text-decoration: none;
		}
	#chat	
		{		
		position:relative;		
		top: 350px;		
		width: 13%;
		min-width:180px;
		max-width: 195px;
		Border: 2px ridge #C0C0C0;		
		font-size: 12px;		
		background-color: #FFFFFF;	
		}
	#chat strong
		{
		color: red;
		}
	<?php
	}?>
</style>
<div id="menu">
	<ul>
	<a href="index_forum.php">Le site</a>
	</ul>	
	<ul>
	<a href="index_forum_bahu.php">Le bahut</a>
	</ul>
	<ul>
	<a href="index_forum_ea.php">Entre aide</a>
	</ul>
	<ul>
	<a href="index_forum_reste.php">Le reste</a>
	</ul>
	<div class="lien">
	<a href="../index.php">Accueil</a> - <a href="../news/news.php">News</a>
	</div>
	<a href="theme.php" id="T2">Changer de thème</a>
</div>	
<div id="chat">    
	<form action="minichat_post.php" method="post"> 
	<p>        
	<label for="pseudo">Statut</label> : 
	<?php 	
	if(empty($_SESSION['prenom'])) {
	echo 'Visiteur(non connect&eacute)';
	}	
	else {
	echo $_SESSION['prenom'];}
	?>
	<br /> 
	<label for="message">Message</label> :  
	<input type="text" name="message" id="message" autocomplete="off" />
	<br />		
	<?php $heure= date('H');
	$minute= date('i');		
	$temps= $heure.'h'.$minute;  
	echo $temps?>        
	<input type="submit" value="Envoyer" />	
	</p>    
	</form>
	<?php	include("minichat.php");?>	
</div>