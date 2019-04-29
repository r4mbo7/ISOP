<?php
if ( $nb_commentaire < 5 AND $sexe == 'Homme')
		{
		$grade= "Nouveau";
		}
		elseif ( $nb_commentaire < 5 AND $sexe == 'Femme')
		{
		$grade= "Nouvelle";
		}
		elseif( $nb_commentaire < 15 AND $sexe == 'Homme' )
		{
		$grade= "Initié";
		}
		elseif( $nb_commentaire < 15 AND $sexe == 'Femme')
		{
		$grade= "Initiée";
		}
		elseif( $nb_commentaire < 50 AND $sexe == 'Homme')
		{
		$grade= "Habitué";
		}
		elseif( $nb_commentaire < 50 AND $sexe == 'Femme')
		{
		$grade= "Habituée";
		}
		elseif( $nb_commentaire < 150 AND $sexe == 'Homme')
		{
		$grade= "Expérimenté";
		}
		elseif( $nb_commentaire < 150 AND $sexe == 'Femme')
		{
		$grade= "Expérimentée";
		}
		elseif( $nb_commentaire < 350 AND $sexe == 'Homme')
		{
		$grade= "Pro";
		}
		elseif( $nb_commentaire < 350 AND $sexe == 'Femme')
		{
		$grade= "Pro";
		}
		elseif( $nb_commentaire < 800 AND $sexe == 'Homme')
		{
		$grade= "Boss";
		}
		elseif( $nb_commentaire < 800 AND $sexe == 'Femme')
		{
		$grade= "Boss";
		}
		elseif( $nb_commentaire < 2000 AND $sexe == 'Homme')
		{
		$grade= "Demi-Dieu";
		}
		elseif( $nb_commentaire < 2000 AND $sexe == 'Femme')
		{
		$grade= "Demi-Déesse";
		}	
		elseif( 2000 < $nb_commentaire AND $sexe == 'Homme')
		{
		$grade= "DIEU";
		}
		elseif( 2000 < $nb_commentaire AND $sexe == 'Femme')
		{
		$grade= "Déesse";
		}
		else
		{ 
		$grade="";
		}
?>