<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
//use Symfony\Component\HttpFoundation\Request;

class PaymentController extends Controller{

  /**
  * @Route("/payment", name="paymentHome")
  */
  public function indexAction(){
    $html = $this -> renderView("/payment/index.html.twig");
    return new Response($html);
  }


  /**
  * @Route("/payment/visa", name="paymentVisa")
  */
  public function visaAction(){
    $html = $this -> renderView("/payment/visaFormPayment.html.twig");
    return new Response($html);
  }
}
