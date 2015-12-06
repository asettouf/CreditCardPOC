<?php
namespace AppBundle\Entity;

class PaymentManagerEntity extends PaymentManagerAbstract{

  protected $msg;

  function __construct(){
    parent::__construct();
    $this -> $msg = "PBX_SITE=".($this -> pbx_site).
    "&PBX_RANG=".$this -> pbx_rang.
    "&PBX_IDENTIFIANT=".$this -> pbx_identifiant.
    "&PBX_TOTAL=".$this -> pbx_total.
    "&PBX_DEVISE=978".
    "&PBX_CMD=".$this -> pbx_cmd.
    "&PBX_PORTEUR=".$this -> pbx_porteur.
    "&PBX_REPONDRE_A=".$this -> pbx_repondre_a.
    "&PBX_RETOUR=".$this -> pbx_retour.
    "&PBX_EFFECTUE=".$this -> pbx_effectue.
    "&PBX_ANNULE=".$this -> pbx_annule.
    "&PBX_REFUSE=".$this -> pbx_refuse.
    "&PBX_HASH=SHA512".
    "&PBX_TIME=".$this -> dateTime;

  }


  public function sendTransaction($amount){

  }

  public function set_dateTime($dateTime){
    $this -> dateTime = $dateTime;
  }

  public function get_dateTime(){
    return $this -> dateTime;
  }

  public function set_pbx_refuse($pbx_refuse){
    $this -> pbx_refuse = $pbx_refuse;
  }

  public function get_pbx_refuse(){
    return $this -> pbx_refuse;
  }

  public function set_pbx_annule($pbx_annule){
    $this -> pbx_annule = $pbx_annule;
  }

  public function get_pbx_annule(){
    return $this -> pbx_annule;
  }

  public function set_pbx_effectue($pbx_effectue){
    $this -> pbx_effectue = $pbx_effectue;
  }

  public function get_pbx_effectue(){
    return $this -> pbx_effectue;
  }

  public function set_pbx_retour($pbx_retour){
    $this -> pbx_retour = $pbx_retour;
  }

  public function get_pbx_retour(){
    return $this -> pbx_retour;
  }

  public function set_pbx_repondre_a($pbx_repondre_a){
    $this -> pbx_repondre_a = $pbx_repondre_a;
  }

  public function get_pbx_repondre_a(){
    return $this -> pbx_repondre_a;
  }

  public function set_pbx_porteur($pbx_porteur){
    $this -> pbx_porteur = $pbx_porteur;
  }

  public function get_pbx_porteur(){
    return $this -> pbx_porteur;
  }

  public function set_pbx_cmd($pbx_cmd){
    $this -> pbx_cmd = $pbx_cmd;
  }

  public function get_pbx_cmd(){
    return $this -> pbx_cmd;
  }

  public function set_pbx_total($pbx_total){
    $this -> pbx_total = $pbx_total;
  }

  public function get_pbx_total(){
    return $this -> pbx_total;
  }

  public function set_pbx_identifiant($pbx_identifiant){
    $this -> pbx_identifiant = $pbx_identifiant;
  }

  public function get_pbx_identifiant(){
    return $this -> pbx_identifiant;
  }

  public function set_pbx_rang($pbx_rang){
    $this -> pbx_rang = $pbx_rang;
  }

  public function get_pbx_rang(){
    return $this -> pbx_rang;
  }

  public function set_pbx_site($pbx_site){
    $this -> pbx_site = $pbx_site;
  }

  public function get_pbx_site(){
    return $this -> pbx_site;
  }
}
