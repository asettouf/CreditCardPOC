<?php
namespace AppBundle\Entity;

class PaymentManagerEntity extends PaymentManagerAbstract{

  protected $msg;

  function __construct(){
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
}
