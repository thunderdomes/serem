<?php
namespace app\components\efek;

class Gray extends Efek
{
    // array config 
    public function createEfek()
    {
    	return [
            'effect'=>'grayscale'
        ];
    }
}