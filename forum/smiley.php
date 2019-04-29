<?php

	if (preg_match("#:u:#", $commentaire) AND preg_match("#:/u:#", $commentaire) )
	{
	$smile=":u:";
	$smile_png="<u>";
	$commentaire=str_replace($smile, $smile_png, $commentaire);
	
	$smile=":/u:";
	$smile_png="</u>";
	$commentaire=str_replace($smile, $smile_png, $commentaire);
	$commentaire.="</u>";
	}
	else
	{
	}
	
	if (preg_match("#:i:#", $commentaire) AND preg_match("#:/i:#", $commentaire) )
	{
	$smile=":i:";
	$smile_png="<i>";
	$commentaire=str_replace($smile, $smile_png, $commentaire);
	
	$smile=":/i:";
	$smile_png="</i>";
	$commentaire=str_replace($smile, $smile_png, $commentaire);
	$commentaire.="</i>";
	}
	else
	{
	}
	
	if (preg_match("#:b:#", $commentaire) AND preg_match("#:/b:#", $commentaire) )
	{
	$smile=":b:";
	$smile_png="<b>";
	$commentaire=str_replace($smile, $smile_png, $commentaire);
	
	$smile=":/b:";
	$smile_png="</b>";
	$commentaire=str_replace($smile, $smile_png, $commentaire);
	$commentaire.="</b>";
	}
	else
	{
	}
	
	if (preg_match("#:a:#", $commentaire) AND preg_match("#:/a:#", $commentaire) )
	{
	$smile=":a:";
	$smile_png="<a style='color:#14283A' target='_blank' href='";
	$commentaire=str_replace($smile, $smile_png, $commentaire);
	
	$smile=":/a:";
	$smile_png="'><u>lien</u></a>";
	$commentaire=str_replace($smile, $smile_png, $commentaire);
	$commentaire.="</a>";
	}
	else
	{
	}
	
	$smile=" :)";
	$smile_png=" <img src='icon/sourire.gif' alt=':)' title=':)'/>";
	$commentaire=str_replace($smile, $smile_png, $commentaire);
	
	$smile=" xD";
	$smile_png=" <img src='icon/xD.gif' alt='xD' title='xD'/>";
	$commentaire=str_replace($smile, $smile_png, $commentaire);
	
	$smile=" -_-";
	$smile_png=" <img src='icon/-_-.gif' alt='-_-' title='-_-'/>";
	$commentaire=str_replace($smile, $smile_png, $commentaire);
	
	$smile=" :x";
	$smile_png=" <img src='icon/x.gif' alt=':x' title=':x'/>";
	$commentaire=str_replace($smile, $smile_png, $commentaire);
	
	$smile=" 8)";
	$smile_png=" <img src='icon/8).gif' alt='8)' title='8)'/>";
	$commentaire=str_replace($smile, $smile_png, $commentaire);
	
	$smile=" O_O";
	$smile_png=" <img src='icon/O_O.gif' alt='O_O' title='O_O'/>";
	$commentaire=str_replace($smile, $smile_png, $commentaire);
	
	$smile=" :(";
	$smile_png=" <img src='icon/triste.gif' alt=':(' title=':('/>";
	$commentaire=str_replace($smile, $smile_png, $commentaire);
	
	$smile=" ;)";
	$smile_png=" <img src='icon/clin_oeil.gif' alt=';)' title=';)'/>";
	$commentaire=str_replace($smile, $smile_png, $commentaire);
	
	$smile=" :D";
	$smile_png=" <img src='icon/grand_sourire.gif' alt=':D' title=':D'/>";
	$commentaire=str_replace($smile, $smile_png, $commentaire);
	
	$smile=" :o";
	$smile_png=" <img src='icon/o.gif' alt=':o' title=':o'/>";
	$commentaire=str_replace($smile, $smile_png, $commentaire);
	
	$smile=" :$";
	$smile_png=" <img src='icon/kiss.png' alt=':$' title=':$'/>";
	$commentaire=str_replace($smile, $smile_png, $commentaire);
	
	$smile=" u_u";
	$smile_png=" <img src='icon/U_U.gif' alt='u_u' title='u_u'/>";
	$commentaire=str_replace($smile, $smile_png, $commentaire);
	
	$smile=" :-#";
	$smile_png=" <img src='icon/motus.gif' alt=':-#' title=':-#'/>";
	$commentaire=str_replace($smile, $smile_png, $commentaire);
	
	$smile=":lol:";
	$smile_png="<img src='icon/lol.gif' alt=':lol:' title=':lol:'/>";
	$commentaire=str_replace($smile, $smile_png, $commentaire);
	
	$smile=" ???";
	$smile_png=" <img src='icon/interrogation.gif' alt='???' title='???'/>";
	$commentaire=str_replace($smile, $smile_png, $commentaire);
	
	$smile=" :@";
	$smile_png=" <img src='icon/enerve.gif' alt=':@' title=':@'/>";
	$commentaire=str_replace($smile, $smile_png, $commentaire);
	
	$smile=" :p";
	$smile_png=" <img src='icon/tire_langue.gif' alt=':p' title=':p'/>";
	$commentaire=str_replace($smile, $smile_png, $commentaire);
	
	$smile=" xp";
	$smile_png=" <img src='icon/langue.gif' alt='xp' title='xp'/>";
	$commentaire=str_replace($smile, $smile_png, $commentaire);
	
	$smile=" zzz";
	$smile_png=" <img src='icon/zzz.gif' alt='zzz' title='zzz'/>";
	$commentaire=str_replace($smile, $smile_png, $commentaire);
	
	$smile=" ^^";
	$smile_png=" <img src='icon/^^.gif' alt='^^' title='^^'/>";
	$commentaire=str_replace($smile, $smile_png, $commentaire);
	
	$smile=":bond:";
	$smile_png="<img src='icon/bond.gif' alt=':bond:' title=':bond:'/>";
	$commentaire=str_replace($smile, $smile_png, $commentaire);
	
	$smile=":help:";
	$smile_png="<img src='icon/help.gif' alt=':help:' title=':help:'/>";
	$commentaire=str_replace($smile, $smile_png, $commentaire);
?>