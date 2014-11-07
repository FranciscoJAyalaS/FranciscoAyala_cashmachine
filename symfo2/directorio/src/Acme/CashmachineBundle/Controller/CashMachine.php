<?php
namespace Acme\CashmachineBundle\Controller;
use Symfony\Component\Form\Exception\InvalidArgumentException;
class CashMachine {

	private $bills = Array(100,50,20,10);
	

	public function validateAmountOfMoney($requestedMoney){
		
		$givenMoney = Array();
		
	
		//the required InvalidArgumentException
		if($requestedMoney < 0){
			throw new InvalidArgumentException("Not valid number");
		}


		
		$residue = 0;
		// counter to go over the list of bills starting on $100.
		$i = 0;

		do{

			//get the integer part to calculate the first number of the highest bills. First the biggest values.
			$integr = floor($requestedMoney/$this->bills[$i]); 
			//get the modulus in order to deliver the next number of bills in descendent order.
			$residue = $requestedMoney%$this->bills[$i];   
			array_push($givenMoney, $integr);
			
		

			$requestedMoney = $residue;
			$i++;
	

		}
		while($residue >= $this->bills[count($this->bills)-1] );

		//arrangement to solve an issue in the view. (temporary)
		if(count($givenMoney) < count($this->bills)){
			do{
			
				array_push($givenMoney, 0);
			}
			while(count($givenMoney) < count($this->bills));		
		}
		
		////the required NoteUnavailableException
		if($residue!=0){
			throw new NoteUnavailableException('The amount of money is not valid! ');
			return 0;
		}
		
		return $givenMoney;	
			
		} // end of function	




}

