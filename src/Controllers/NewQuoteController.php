<?php

namespace SlimAutoCover\Controllers;

class NewQuoteController
{
    private $carType;
    private $coverType;
    private $carValue;

//    Create a Viewhelper and get the POST data in order to do the calculation to output (Viewhelper goes in this controller?)

    public function __construct($carType, $coverType, $carValue)
    {
        $this->carType = $carType;
        $this->coverType = $coverType;
        $this->carValue = $carValue;
    }

    public function __invoke()
    {
        if($carType)
    }

}