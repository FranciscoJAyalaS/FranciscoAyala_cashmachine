<?php
namespace Acme\CashmachineBundle\Controller;
use Symfony\Component\Form\Exception\InvalidArgumentException;

class NoteUnavailableException extends InvalidArgumentException
{
    
    public function __construct($message, $code = 0, Exception $previous = null) {
       
    
        
        parent::__construct($message, $code, $previous);
    }

   
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }

    public function funciónPersonalizada() {
        echo "Una función personalizada para este tipo de excepción\n";
    }
}