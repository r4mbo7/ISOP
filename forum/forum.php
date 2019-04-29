<?php 
	session_start ();
?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
    <head>
        <title>Forum ISOP</title>
		<link rel="shortcut icon" type="image/x-icon" href="Logo2.ico" />
		<meta name="decription" content="Site entre lyceen">
		<style type="text/css">
		<?php
		if(empty($_SESSION['theme']) OR $_SESSION['theme']==1)
		{?>
		body
		{
		background-image: url(fond_forum.png);
		background-repeat: no-repeat;
		height: 98%;
		width: 98%;	
		}
		h2
		{
		margin-top:100px;
		}
		<?php
		}
		else
		{?>
		body
		{
		background-image: url(fond_forum2.png);
		background-repeat: no-repeat;
		height: 98%;
		width: 98%;	
		}
		h2
		{
		margin-top:100px;
		}
		<?php 
		}
		?>
		</style>
		</head>
<body>
<center><h2><?php echo htmlentities($_SESSION['prenom']);?></h2></center>
<p><u>Régles du forum:</u><br><br>

I1): Tout propos injurieux, raciste, homophobe...  sera répréhensible d'un bannissement définitif. Au minimum, le membre en question aura un avertissement. <br><br>

I2): Toute tentative de vol de compte, piratage, escroquerie... sera banni du forum sans préavis. <br><br>

I3): Aucun lien de parrainage, fake, jeux débiles (censure, labru*e.fr), pub ou bien menant vers des sites à inscription obligatoire ne doivent être postés que se soit dans n'importe quelle section du forum. Vous risquez d'être banni sans préavis.<br><br>

I4): Si vous avez à critiquer un post... Faites-le de façon correcte et non de façon sarcastique ou injurieuse. Ceci est pour la bonne entente de tous. <br><br>

I5): Merci d'écrire en français, les fautes d'orthographe involontaires ne seront pas sanctionnées. Le langage SMS n'est par contre pas accepté et le membre en question sera sanctionné d'un avertissement. <br><br>

I6): La vente, l'échange ou l'achat de biens, de comptes ou autre, n'est pas toléré sur le forum, vous risquez une exclusion définitive du forum. <br>
</p>
<p>Option de caractére : <br>
<ul><u>souligné</u> = :u: souligné :/u:</ul>
<ul><i>italique</i> = :i: italique :/i:</ul>
<ul><b>gras</b> = :b: gras :/b:</ul>
Il est important d'intiquer la fin de caractéres spéciaux avec :/(lettre correspondante si dessus):
</p>
<p>Liste des smileys :
<ul><img src='icon/sourire.gif' alt=':)' title=':)'/> = :)</ul>
<ul><img src='icon/triste.gif' alt=':(' title=':('/> = :(</ul>
<ul><img src='icon/clin_oeil.gif' alt=';)' title=';)'/> = ;)</ul>
<ul><img src='icon/grand_sourire.gif' alt=':D' title=':D'/> = :D</ul>
<ul><img src='icon/xD.gif' alt='xD' title='xD'/> = xD</ul>
<ul><img src='icon/8).gif' alt='8)' title='8)'/> = 8)</ul>
<ul><img src='icon/U_U.gif' alt='u_u' title='u_u'/> = u_u</ul>
<ul><img src='icon/motus.gif' alt=':-#' title=':-#'/> = :-#</ul>
<ul><img src='icon/o.gif' alt=':o' title=':o'/> = :o</ul>
<ul><img src='icon/^^.gif' alt='^^' title='^^'/> = ^^</ul>
<ul><img src='icon/O_O.gif' alt='O_O' title='O_O'/> = O_O</ul>
<ul><img src='icon/-_-.gif' alt='-_-' title='-_-'/> = -_-</ul>
<ul><img src='icon/lol.gif' alt=':lol:' title=':lol:'/> = :lol:</ul>
<ul><img src='icon/interrogation.gif' alt='???' title='???'/> = ???</ul>
<ul><img src='icon/enerve.gif' alt=':@' title=':@'/> = :@</ul>
<ul><img src='icon/langue.gif' alt=':p' title=':p'/> = :p</ul>
<ul><img src='icon/tire_langue.gif' alt='xp' title='xp'/> = xp</ul>
<ul><img src='icon/bond.gif' alt=':bond:' title=':bond:'/> = :bond:</ul>
<ul><img src='icon/help.gif' alt=':help:' title=':help:'/> = :help:</ul>
<ul><img src='icon/zzz.gif' alt='zzz' title='zzz'/> = zzz</ul>
</p>
</body>
</html>
