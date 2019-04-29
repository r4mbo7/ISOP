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
		$titre_auteur= "Initié";
		}
		elseif( $info['nb_message'] < 15 AND $info['sexe'] == 'Femme')
		{
		$titre_auteur= "Initiée";
		}
		elseif( $info['nb_message'] < 50 AND $info['sexe'] == 'Homme')
		{
		$titre_auteur= "Habitué";
		}
		elseif( $info['nb_message'] < 50 AND $info['sexe'] == 'Femme')
		{
		$titre_auteur= "Habituée";
		}
		elseif( $info['nb_message'] < 150 AND $info['sexe'] == 'Homme')
		{
		$titre_auteur= "Expérimenté";
		}
		elseif( $info['nb_message'] < 150 AND $info['sexe'] == 'Femme')
		{
		$titre_auteur= "Expérimentée";
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
		$titre_auteur= "Demi-Déesse";
		}	
		elseif( 2000 < $info['nb_message'] AND $info['sexe'] == 'Homme')
		{
		$titre_auteur= "DIEU";
		}
		elseif( 2000 < $info['nb_message'] AND $info['sexe'] == 'Femme')
		{
		$titre_auteur= "Déesse";
		}
		else
		{ 
		$titre_auteur="";
		}
?>