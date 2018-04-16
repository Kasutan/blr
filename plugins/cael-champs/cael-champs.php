<?php 
/*Plugin Name: Champs personnalisés du site CAEL
Description: Ce plugin affiche les champs des différentes pages dans l'interface d'administration. Nécessite l'extension CMB2 pour fonctionner correctement.
Version: 1.0
License: GPLv2
Author: Rodolphe Cazemajou-Tournié
*/

if ( ! defined( 'ABSPATH' ) ) exit;

// Définition de la constante CMB2
define( 'CMB_PREFIX', 'cael_' );

// Champs de la page d'accueil
require_once( 'includes/cael-calendrier.php' );
require_once( 'includes/cael-activites.php' );
require_once( 'includes/cael-reseaux.php' );
require_once( 'includes/cael-apropos.php' );

// Champs de la page Le CAEL
require_once( 'includes/cael-association.php' );
require_once( 'includes/cael-projet.php' );
require_once( 'includes/cael-chiffres.php' );
require_once( 'includes/cael-equipe.php' );
require_once( 'includes/cael-partenaires.php' );

// Champs de la page Nos Actions
require_once( 'includes/cael-social.php' );
require_once( 'includes/cael-famille.php' );
require_once( 'includes/cael-senior.php' );
require_once( 'includes/cael-bafa.php' );

// Champs de la page Contact
require_once( 'includes/cael-contact.php' );
require_once( 'includes/cael-horaires.php' );
require_once( 'includes/cael-acces.php' );
require_once( 'includes/cael-inscriptions.php' );

// Champs supplémentaires pour les activités
require_once( 'includes/cael-catactivites.php' );

// Champs supplémentaires pour les actualités
require_once( 'includes/cael-actualites.php' );

// Intègre les Custom Post Types
require_once('includes/CPTequipe.php');
require_once('includes/CPTadministration.php');
require_once('includes/CPTpartenaires.php');