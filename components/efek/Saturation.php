<?php
namespace app\components\efek;

class Saturation extends Efek
{
	function __construct($saturation = 60) {
    	$this->saturation = $saturation;
    }
    // array config 
    public $saturation;
    public function createEfek()
    {
    	return [
            'effect'=>'saturation:'.$this->saturation,
        ];
    }
}