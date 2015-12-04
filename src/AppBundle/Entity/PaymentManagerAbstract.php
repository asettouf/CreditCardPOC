<?php

/ Ennonciation de variables
protected $pbx_site = 'votre n° de site';									//variable de test 1999888
protected $pbx_rang = 'votre n° de rang';									//variable de test 32
protected $pbx_identifiant = 'votre n° d identifiant site';				//variable de test 3
protected $pbx_cmd = 'votre n° de commande';								//variable de test cmd_test1
protected $pbx_porteur = 'email de l acheteur';							//variable de test test@test.fr
protected $pbx_total = 'votre montant';									//variable de test 100
// Suppression des points ou virgules dans le montant
protected $pbx_total = str_replace(",", "", $pbx_total);
protected $pbx_total = str_replace(".", "", $pbx_total);

// Paramétrage des urls de redirection après paiement
protected my_website = "http://www.votre-site.extention/";
protected $pbx_effectue = my_website.'page-de-confirmation';
protected $pbx_annule = my_website.'page-d-annulation';
protected $pbx_refuse = my_website.'page-de-refus';
// Paramétrage de l'url de retour back office site
protected $pbx_repondre_a = my_website.'page-de-back-office-site';
// Paramétrage du retour back office site
protected $pbx_retour = 'Mt:M;Ref:R;Auto:A;Erreur:E';

// Connection à la base de données
// mysql_connect...
// On récupère la clé secrète HMAC (stockée dans une base de données par exemple) et que l’on renseigne dans la variable $keyTest;
//$keyTest = '0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF';
protected $keyTest = '';
protected $serveurs = array('tpeweb.paybox.com'); //serveur secondaire
protected $dateTime = date("c");
protected $msg = "PBX_SITE=".$pbx_site.
"&PBX_RANG=".	$pbx_rang.
"&PBX_IDENTIFIANT=".$pbx_identifiant.
"&PBX_TOTAL=".$pbx_total.
"&PBX_DEVISE=978".
"&PBX_CMD=".$pbx_cmd.
"&PBX_PORTEUR=".$pbx_porteur.
"&PBX_REPONDRE_A=".$pbx_repondre_a.
"&PBX_RETOUR=".$pbx_retour.
"&PBX_EFFECTUE=".$pbx_effectue.
"&PBX_ANNULE=".$pbx_annule.
"&PBX_REFUSE=".$pbx_refuse.
"&PBX_HASH=SHA512".
"&PBX_TIME=".$dateTime;

protected $binKey = pack("H*", $keyTest);

// On calcule l’empreinte (à renseigner dans le paramètre PBX_HMAC) grâce à la fonction hash_hmac et //
// la clé binaire
// On envoi via la variable PBX_HASH l'algorithme de hachage qui a été utilisé (SHA512 dans ce cas)
// Pour afficher la liste des algorithmes disponibles sur votre environnement, décommentez la ligne //
// suivante
// print_r(hash_algos());
protected $hmac = strtoupper(hash_hmac('sha512', $msg, $binKey));
