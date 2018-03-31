#!/bin/bash
php wp-cli.phar post create --post_type=page --post_status=publish --post_title='Accueil'
php wp-cli.phar post create --post_type=page --post_status=publish --post_title='Le CAEL'
php wp-cli.phar post create --post_type=page --post_status=publish --post_title='Nos activit&eacute;s'
php wp-cli.phar post create --post_type=page --post_status=publish --post_title='Ev&egrave;nements'
php wp-cli.phar post create --post_type=page --post_status=publish --post_title='Nos actions'
php wp-cli.phar post create --post_type=page --post_status=publish --post_title='Famille'
php wp-cli.phar post create --post_type=page --post_status=publish --post_title='S&eacute;nior'
php wp-cli.phar post create --post_type=page --post_status=publish --post_title='BAFA'
php wp-cli.phar post create --post_type=page --post_status=publish --post_title='Informations'
php wp-cli.phar post create --post_type=page --post_status=publish --post_title='Calendrier g&eacute;n&eacute;ral'
php wp-cli.phar post create --post_type=page --post_status=publish --post_title='Mentions l&eacute;gales &amp; cr&eacute;dits'
php wp-cli.phar post create --post_type=page --post_status=publish --post_title='Documents t&eacute;l&eacute;charg.'
php wp-cli.phar post create --post_type=page --post_status=publish --post_title='Plan du site'
php wp-cli.phar menu create "Menu principal"
php wp-cli.phar menu location assign menu-principal primary