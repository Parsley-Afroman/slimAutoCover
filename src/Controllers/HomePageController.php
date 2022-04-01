<?php

namespace SlimAutoCover\Controllers;

use Slim\Views\PhpRenderer;
use SlimAutoCover\Models\CarTypeModel;
use SlimAutoCover\Models\CoverTypeModel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class HomePageController
{
    private $renderer;
    private $carTypeModel;
    private $coverTypeModel;

    public function __construct(PhpRenderer $renderer, CarTypeModel $carTypeModel, CoverTypeModel $coverTypeModel)
    {
        $this->renderer = $renderer;
        $this->carTypeModel = $carTypeModel;
        $this->coverTypeModel = $coverTypeModel;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $args['carType'] = $this->carTypeModel->getCarType();
        $args['carMultipler'] = $this->carTypeModel->getCarMultiplier();
        $args['coverType'] = $this->coverTypeModel->getCoverType();
        $args['coverMultipler'] = $this->coverTypeModel->getCoverMultiplier();

        return $this->renderer->render($response, 'index.phtml', $args);
    }
}