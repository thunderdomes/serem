<?php
namespace app\components\efek;

class Vibrance extends Efek
{
	function __construct($vibrance = 60) {
    	$this->vibrance = $vibrance;
    }
    // array config 
    public $vibrance;
    public function createEfek()
    {
    	return [
            'effect'=>'vibrance:'.$this->vibrance,
        ];
    }
}