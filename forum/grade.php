<?php
if ( $info['nb_message'] < 5 AND $info['sexe'] == 'Homme')
		{
		$titre_auteur= "Nouveau";
		}
		elseif ( $info['nb_message'] < 5 AND $info['sexe'] == 'Femme')
		{
		$titre_auteur= "Nouvelle";
		}
		elseif( $info['nb_message'] < 15 AND $info['sexe'] == 'Homme' )
		{
		$titre_auteur= "Initi�";
		}
		elseif( $info['nb_message'] < 15 AND $info['sexe'] == 'Femme')
		{
		$titre_auteur= "Initi�e";
		}
		elseif( $info['nb_message'] < 50 AND $info['sexe'] == 'Homme')
		{
		$titre_auteur= "Habitu�";
		}
		elseif( $info['nb_message'] < 50 AND $info['sexe'] == 'Femme')
		{
		$titre_auteur= "Habitu�e";
		}
		elseif( $info['nb_message'] < 150 AND $info['sexe'] == 'Homme')
		{
		$titre_auteur= "Exp�riment�";
		}
		elseif( $info['nb_message'] < 150 AND $info['sexe'] == 'Femme')
		{
		$titre_auteur= "Exp�riment�e";
		}
		elseif( $info['nb_message'] < 350 AND $info['sexe'] == 'Homme')
		{
		$titre_auteur= "Pro";
		}
		elseif( $info['nb_message'] < 350 AND $info['sexe'] == 'Femme')
		{
		$titre_auteur= "Pro";
		}
		elseif( $info['nb_message'] < 800 AND $info['sexe'] == 'Homme')
		{
		$titre_auteur= "Boss";
		}
		elseif( $info['nb_message'] < 800 AND $info['sexe'] == 'Femme')
		{
		$titre_auteur= "Boss";
		}
		elseif( $info['nb_message'] < 2000 AND $info['sexe'] == 'Homme')
		{
		$titre_auteur= "Demi-Dieu";
		}
		elseif( $info['nb_message'] < 2000 AND $info['sexe'] == 'Femme')
		{
		$titre_auteur= "Demi-D�esse";
		}	
		elseif( 2000 < $info['nb_message'] AND $info['sexe'] == 'Homme')
		{
		$titre_auteur= "DIEU";
		}
		elseif( 2000 < $info['nb_message'] AND $info['sexe'] == 'Femme')
		{
		$titre_auteur= "D�esse";
		}
		else
		{ 
		$titre_auteur="";
		}
?>