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
		$grade= "Initi�";
		}
		elseif( $nb_commentaire < 15 AND $sexe == 'Femme')
		{
		$grade= "Initi�e";
		}
		elseif( $nb_commentaire < 50 AND $sexe == 'Homme')
		{
		$grade= "Habitu�";
		}
		elseif( $nb_commentaire < 50 AND $sexe == 'Femme')
		{
		$grade= "Habitu�e";
		}
		elseif( $nb_commentaire < 150 AND $sexe == 'Homme')
		{
		$grade= "Exp�riment�";
		}
		elseif( $nb_commentaire < 150 AND $sexe == 'Femme')
		{
		$grade= "Exp�riment�e";
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
		$grade= "Demi-D�esse";
		}	
		elseif( 2000 < $nb_commentaire AND $sexe == 'Homme')
		{
		$grade= "DIEU";
		}
		elseif( 2000 < $nb_commentaire AND $sexe == 'Femme')
		{
		$grade= "D�esse";
		}
		else
		{ 
		$grade="";
		}
?>