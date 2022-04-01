<?php

namespace SlimAutoCover\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\PhpRenderer;

class NewQuoteController
{
    private $carType;
    private $coverType;
    private $carValue;
    private $renderer;

//    Create a Viewhelper and get the POST data in order to do the calculation to output (Viewhelper goes in this controller?)

    public function __construct(PhpRenderer $renderer, $carType, $coverType, $carValue)
    {
        $this->carType = $carType;
        $this->coverType = $coverType;
        $this->carValue = $carValue;
        $this->renderer = $renderer;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $request->getParsedBody('');
    }

}