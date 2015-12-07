<?php
namespace AppBundle\Entity;

class PaymentManagerEntity extends PaymentManagerAbstract{

  public $msg;

  function __construct(){
    parent::__construct();

  //  $this -> hmac = strtoupper(hash_hmac('sha512', $msg, $this -> binKey));
  }


  public function sendTransaction($amount){

  }

  public function setPbxDateTime($dateTime){
    $this -> dateTime = $dateTime;
  }

  public function getPbxDateTime(){
    return $this -> dateTime;
  }

  public function setPbxRefuse($pbx_refuse){
    $this -> pbx_refuse = $pbx_refuse;
  }

  public function getPbxRefuse(){
    return $this -> pbx_refuse;
  }

  public function setPbxAnnule($pbx_annule){
    $this -> pbx_annule = $pbx_annule;
  }

  public function getPbxAnnule(){
    return $this -> pbx_annule;
  }

  public function setPbxEffectue($pbx_effectue){
    $this -> pbx_effectue = $pbx_effectue;
  }

  public function getPbxEffectue(){
    return $this -> pbx_effectue;
  }

  public function setPbxRetour($pbx_retour){
    $this -> pbx_retour = $pbx_retour;
  }

  public function getPbxRetour(){
    return $this -> pbx_retour;
  }

  public function setPbxRepondreA($pbx_repondre_a){
    $this -> pbx_repondre_a = $pbx_repondre_a;
  }

  public function getPbxRepondreA(){
    return $this -> pbx_repondre_a;
  }

  public function setPbxPorteur($pbx_porteur){
    $this -> pbx_porteur = $pbx_porteur;
  }

  public function getPbxPorteur(){
    return $this -> pbx_porteur;
  }

  public function setPbxCmd($pbx_cmd){
    $this -> pbx_cmd = $pbx_cmd;
  }

  public function getPbxCmd(){
    return $this -> pbx_cmd;
  }

  public function setPbxTotal($pbx_total){
    $this -> pbx_total = $pbx_total;
  }

  public function getPbxTotal(){
    return $this -> pbx_total;
  }

  public function setPbxIdentifiant($pbx_identifiant){
    $this -> pbx_identifiant = $pbx_identifiant;
  }

  public function getPbxIdentifiant(){
    return $this -> pbx_identifiant;
  }

  public function setPbxRang($pbx_rang){
    $this -> pbx_rang = $pbx_rang;
  }

  public function getPbxRang(){
    return $this -> pbx_rang;
  }

  public function setPbxSite($pbx_site){
    $this -> pbx_site = $pbx_site;
  }

  public function getPbxSite(){
    return $this -> pbx_site;
  }
}
