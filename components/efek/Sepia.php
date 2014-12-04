<?php
namespace app\components\efek;

class Sepia extends Efek
{
    // array config 
    public function createEfek()
    {
    	return [
            'effect'=>'sepia'
        ];
    }
}