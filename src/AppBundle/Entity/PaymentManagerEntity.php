<?php
namespace AppBundle\Entity;

class PaymentManagerEntity extends PaymentManagerAbstract{

  public $msg;

  function __construct(){
    parent::__construct();
    $this -> dateTime = date("c");
    $this -> computeHmac();
  }


  public function computeHmac(){
    $this -> msg = "PBX_SITE=".$this -> pbx_site.
    "&PBX_RANG=".	$this -> pbx_rang.
    "&PBX_IDENTIFIANT=".$this -> pbx_identifiant.
    "&PBX_TOTAL=".$this -> pbx_total.
    "&PBX_DEVISE=".$this -> pbx_devise.
    "&PBX_CMD=".$this -> pbx_cmd.
    //"&PBX_TYPEPAIEMENT=".$this -> pbx_card.
    "&PBX_PORTEUR=".$this -> pbx_porteur.
    "&PBX_REPONDRE_A=".$this -> pbx_repondre_a.
    "&PBX_RETOUR=".$this -> pbx_retour.
    "&PBX_EFFECTUE=".$this -> pbx_effectue.
    "&PBX_ANNULE=".$this -> pbx_annule.
    "&PBX_REFUSE=".$this -> pbx_refuse.
    "&PBX_HASH=".$this -> pbx_hash.
    "&PBX_TIME=".$this -> dateTime;
    $this -> binKey = pack("H*", $this -> keyTest);
    $this -> pbx_hmac = strtoupper(hash_hmac($this -> pbx_hash, $this -> msg, $this -> binKey));
  }

  public function setPbxTypePaiement($pbx_card){
    $this -> pbx_card = $pbx_card;
  }

  public function getPbxTypePaiement(){
    return $this -> pbx_card;
  }

  public function setPbxHmac($pbx_hmac){
    $this -> pbx_hmac = $pbx_hmac;
  }

  public function getPbxHmac(){
    return $this -> pbx_hmac;
  }

  public function setPbxHash($pbx_hash){
    $this -> pbx_hash = $pbx_hash;
  }

  public function getPbxHash(){
    return $this -> pbx_hash;
  }

  public function setPbxDevise($pbx_devise){
    $this -> pbx_devise = $pbx_devise;
  }

  public function getPbxDevise(){
    return $this -> pbx_devise;
  }

  public function setPbxTime($dateTime){
    $this -> dateTime = $dateTime;
  }

  public function getPbxTime(){
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
