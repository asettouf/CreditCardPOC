<?php
namespace AppBundle\Entity;

class PaymentManagerAbstract{
  private $configs;
  // Ennonciation de variables
  protected $pbx_site;									//variable de test 1999888
  protected $pbx_rang;									//variable de test 32
  protected $pbx_identifiant;				//variable de test 3
  protected $pbx_cmd;								//variable de test cmd_test1
  protected $pbx_porteur = 'email de l acheteur';							//variable de test test@test.fr
  protected $pbx_total = 'votre montant';									//variable de test 100
  // Suppression des points ou virgules dans le montant


  // Paramétrage des urls de redirection après paiement
  protected $my_website;
  protected $pbx_effectue;
  protected $pbx_annule;
  protected $pbx_refuse;
  // Paramétrage de l'url de retour back office site
  protected $pbx_repondre_a;
  // Paramétrage du retour back office site
  protected $pbx_retour;

  // Connection à la base de données
  // mysql_connect...
  // On récupère la clé secrète HMAC (stockée dans une base de données par exemple) et que l’on renseigne dans la variable $keyTest;
  //$keyTest = '0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF';
  protected $keyTest;
  protected $serveurs; //serveur secondaire
  protected $dateTime;


  protected $binKey;

  // On calcule l’empreinte (à renseigner dans le paramètre PBX_HMAC) grâce à la fonction hash_hmac et //
  // la clé binaire
  // On envoi via la variable PBX_HASH l'algorithme de hachage qui a été utilisé (SHA512 dans ce cas)
  // Pour afficher la liste des algorithmes disponibles sur votre environnement, décommentez la ligne //
  // suivante
  // print_r(hash_algos());
  protected $hmac;
  function __construct(){
    $configs = include("payment_constants.php");
    $this -> $pbx_site = $this -> configs["site"];
    $this -> $pbx_rang = $this -> configs["rank"];
    $this -> $pbx_identifiant = $this -> configs["identifier"];
    $this -> $pbx_cmd = 'cmd_test1';
    $this -> $pbx_porteur = 'email de l acheteur';
    $this -> $pbx_total = 'votre montant';
    $this -> $pbx_total = str_replace(",", "", $pbx_total);
    $this -> $pbx_total = str_replace(".", "", $pbx_total);

    $this -> $my_website =  $this -> configs["server"];
    $this -> $pbx_effectue = my_website.'confirm';
    $this -> $pbx_annule = my_website.'cancel';
    $this -> $pbx_refuse = my_website.'refuse';
    $this -> $pbx_repondre_a = my_website.'paymentbackend';
    $this -> $pbx_retour = 'Mt:M;Ref:R;Auto:A;Erreur:E';


    $this -> $keyTest = $this -> configs["hmac_key"];
    $this -> $serveurs = array('tpeweb.paybox.com', 'tpeweb1.paybox.com');
    $this -> $dateTime = date("c");
    $this -> $binKey = pack("H*", $keyTest);

    $this -> $hmac = strtoupper(hash_hmac('sha512', $msg, $binKey));
  }

}
