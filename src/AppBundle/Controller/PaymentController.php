<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use AppBundle\Entity\PaymentManagerEntity;

class PaymentController extends Controller{
  protected $typeOfPayment = "visa";
  protected $amount = 5;
  /**
  * @Route("/payment", name="paymentHome")
  */
  public function indexAction(){
    $html = $this -> renderView("/payment/index.html.twig");
    return new Response($html);
  }

  /**
  * @Route("/payment/visa", name="paymentVisa")
  * @Method("GET")
  */
  public function visaAction(){
    $html = $this -> renderView("/payment/visaFormPayment.html.twig");
    return new Response($html);
  }

  /**
   * @Route("/payment/visa", name="paymentVisaSubmitted")
   * @Method("POST")
   * route for confirming order
   */
  public function onCardSubmission(Request $request){
    $this -> amount = $request -> get("pbx_total") * 100;
    $paymentForm   = $this -> buildFormForConfirmation();
    $html = $this -> renderView("/payment/visaConfirm.html.twig",
      array("amount" => $this -> amount, "form" => $paymentForm -> createView()));
    return new Response($html);
  }


  protected function buildFormForConfirmation(){
    $payment = new PaymentManagerEntity();
    $logger = $this->get('logger');
    $logger -> info("Hello check var: ".$payment -> getPbxSite());
    $payment -> setPbxTotal($this -> amount);
    $paymentForm = $this -> get("form.factory") -> createNamedBuilder(null, 'form',$payment, array('label' => false))
    ->setAction("https://preprod-tpeweb.e-transactions.fr/cgi/MYchoix_pagepaiement.cgi")
    ->add("PBX_SITE")
    ->add("PBX_RANG")
    ->add("PBX_IDENTIFIANT")
    ->add("PBX_TOTAL")
    ->add("PBX_DEVISE")
    ->add("PBX_CMD")
    //->add("PBX_TYPEPAIEMENT")
    ->add("PBX_PORTEUR")
    ->add("PBX_REPONDRE_A")
    ->add("PBX_RETOUR")
    ->add("PBX_EFFECTUE")
    ->add("PBX_ANNULE")
    ->add("PBX_REFUSE")
    ->add("PBX_HASH")
    ->add("PBX_TIME")
    ->add("PBX_HMAC")
    ->add("save", "submit", array('label' => 'Confirm Payment'))
    ->getForm();
    return $paymentForm;
  }
  /**
  * @Route("/payment/confirm", name="paymentConfirm")
  */
  public function confirmSubmission(){
    $html = $this -> renderView("/payment/".$this->typeOfPayment."Confirm.html.twig",
      array("amount" => $this -> amount));
    return new Response($html);
  }

  /**
  * @Route("/payment/success", name="paymentSuccess")
  */
  public function successfulSubmission(){
    $html = $this -> renderView("/payment/".$this->typeOfPayment."Success.html.twig",
      array("amount" => $this -> amount));
    return new Response($html);
  }

  /**
  * @Route("/payment/refuse", name="paymentRefuse")
  */
  public function refusedSubmission(){
    $html = $this -> renderView("/payment/".$this->typeOfPayment."Refuse.html.twig",
      array("amount" => $this -> amount));
    return new Response($html);
  }

  /**
  * @Route("/payment/cancel", name="paymentCancel")
  */
  public function cancelSubmission(){
    $html = $this -> renderView("/payment/".$this->typeOfPayment."Cancel.html.twig",
      array("amount" => $this -> amount));
    return new Response($html);
  }

}
