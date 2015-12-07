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
   */
  public function onCardSubmission(Request $request){
    $this -> amount = $request -> get("amount");
    $paymentForm = $this -> buildFormForConfirmation();
    $html = $this -> renderView("/payment/visaConfirm.html.twig",
      array("amount" => $this -> amount, "form" => $paymentForm -> createView()));
    return new Response($html);
  }

  protected function buildFormForConfirmation(){
    $payment = new PaymentManagerEntity();
    $logger = $this->get('logger');
    $logger -> info("Hello check var: ".$payment -> getPbxSite());
    $payment -> setPbxTotal($this -> amount);
    $paymentForm = $this -> createFormBuilder($payment)
    ->add("pbx_site")
    ->add("pbx_rang")
    ->add("pbx_identifiant")
    ->add("pbx_total")
    ->add("pbx_cmd")
    ->add("pbx_porteur")
    ->add("pbx_repondre_a")
    ->add("pbx_retour")
    ->add("pbx_effectue")
    ->add("pbx_annule")
    ->add("pbx_refuse")
    ->add("pbx_dateTime")
    ->add('save', "submit", array('label' => 'Confirm Payment'))
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
