<?php 

namespace SlimAutoCover\Controllers;

use Slim\Views\PhpRenderer;
use SlimAutoCover\Models\CarTypeModel;
use SlimAutoCover\Models\CoverTypeModel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class NewQuotePageController
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
        $formData = $request->getParsedBody();
        $getCarMultiplier = $this->carTypeModel->getCarMultiplier($formData['carType']);
        $carMultiplier = $getCarMultiplier[0]['type_multiplier'];
        $getCoverMultiplier = $this->coverTypeModel->getCoverMultiplier($formData['coverType']);
        $coverMultiplier = $getCoverMultiplier[0]['cover_multiplier'];
        $carValue = $formData['carValue'];
        $coverSum = $coverMultiplier * $carValue;
        $carSum = $carMultiplier * $carValue;
        $total = $coverSum + $carSum;
        $args['quote'] = $total;
        $args['carType'] = $formData['carType'];
        $args['coverType'] = $formData['coverType'];

        return $this->renderer->render($response,'accept.phtml', $args);
    }
}
?>