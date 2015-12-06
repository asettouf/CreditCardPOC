<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\PaymentManagerEntity;
use Symfony\Component\Form\Extension\Core\Type\TextType;

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
    $paymentForm = buildFormForConfirmation();
    $html = $this -> renderView("/payment/visaConfirm.html.twig",
      array("amount" => $this -> amount, "form" => $paymentForm -> createView()));
    return new Response($html);
  }

  protected function buildFormForConfirmation(){
    $payment = new PaymentEntity();
    $paymentForm = $this -> createFormBuilder($payment)
    ->add("pbx_site", TextType::class)
    ->add("pbx_rang", TextType::class)
    ->add("pbx_identifiant", TextType::class)
    ->add("pbx_total", TextType::class)
    ->add("pbx_cmd", TextType::class)
    ->add("pbx_porteur", TextType::class)
    ->add("pbx_repondre_a", TextType::class)
    ->add("pbx_retour", TextType::class)
    ->add("pbx_effectue", TextType::class)
    ->add("pbx_annule", TextType::class)
    ->add("pbx_refuse", TextType::class)
    ->add("pbx_dateTime", TextType::class);
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
  public function refused
  Submission(){
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
