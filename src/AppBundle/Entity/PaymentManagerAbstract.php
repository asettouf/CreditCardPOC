<?php
namespace AppBundle\Entity;

class PaymentManagerAbstract{
  private $configs;
  // Ennonciation de variables
  protected $pbx_site;									//variable de test 1999888
  protected $pbx_rang;									//variable de test 32
  protected $pbx_identifiant;				//variable de test 3
  protected $pbx_cmd;								//variable de test cmd_test1
  protected $pbx_porteur = 'test@test.fr';							//variable de test test@test.fr
  protected $pbx_total = 'votre montant';
  protected $pbx_devise = 978;
  protected $pbx_hash = "SHA512";							//variable de test 100
  // Suppression des points ou virgules dans le montant
  protected $pbx_card = "CB";

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
  protected $pbx_hmac;
  function __construct(){
    $this -> configs = include("payment_constants.php");
    $this -> pbx_site = $this -> configs["site"];
    $this -> pbx_rang = $this -> configs["rank"];
    $this -> pbx_identifiant = $this -> configs["identifier"];
    $this -> pbx_cmd = 'cmd_test1';
    $this -> pbx_porteur = 'adonis.settouf@gmail.com';
    $this -> pbx_total = 'votre montant';
    $this -> pbx_total = str_replace(",", "", $this -> pbx_total);
    $this -> pbx_total = str_replace(".", "", $this -> pbx_total);

    $this -> my_website =  $this -> configs["server"];
    $this -> pbx_effectue = $this -> my_website.'confirm';
    $this -> pbx_annule = $this -> my_website.'cancel';
    $this -> pbx_refuse = $this -> my_website.'refuse';
    $this -> pbx_repondre_a = $this -> my_website.'paymentbackend';
    $this -> pbx_retour = 'Mt:M;Ref:R;Auto:A;Erreur:E';


    $this -> keyTest = $this -> configs["hmac_key"];
    $this -> serveurs = array('tpeweb.paybox.com', 'tpeweb1.paybox.com');
  }

}
