<?php

namespace Acme\CashmachineBundle\Controller;
 
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

 
class CashmachineController extends Controller
{
	public function indexAction()
    {
		
		$currentLink = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; // to be sent to the form
		
		$requestedMoney = isset($_POST['howmuch']) ? $_POST['howmuch'] : 0;
		$givenMoney = $this->validate_request($requestedMoney);

        return $this->render('AcmeCashmachineBundle:Cashmachine:index.html.twig',array('url' => $currentLink, 'requested_money' => $requestedMoney,
		'given' => $givenMoney));
    }

	public function validate_request($requestedMoney){
	
	
	
	$cm = new CashMachine;
	$givenMoney = $cm->validateAmountOfMoney($requestedMoney);
	return $givenMoney;
	
	}
	
}
