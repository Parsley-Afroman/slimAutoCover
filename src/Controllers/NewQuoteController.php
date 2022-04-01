<?php

namespace SlimAutoCover\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use SlimAutoCover\Models\NewQuoteModel;
use Slim\Views\PhpRenderer;

class NewQuoteController
{
    private $renderer;

//    Create a Viewhelper and get the POST data in order to do the calculation to output (Viewhelper goes in this controller?)

    public function __construct(PhpRenderer $renderer)
    {
        $this->renderer = $renderer;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $input = $request->getParsedBody();
        $id = $input['id'];


        $args['carMultiplier'] = $this->NewQuoteModel->getCarMultiplier($id);
        $args['carValue'] = $input['carValue'];
        $args['input'] = $input;

        return $this->renderer->render($response, 'accept.phtml', $args);
    }

}