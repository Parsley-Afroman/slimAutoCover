<?php
$container['NewQuoteModel'] = DI\factory('SlimAutoCover\Factories\NewQuoteModelFactory');
$container['NewQuoteController'] = DI\factory('\SlimAutoCover\Factories\NewQuoteControllerFactory');
//Above is from dependencies

$app->post('/newQuote', 'NewQuoteController');
//    newQuote -> receives the form POST data -> outputs to accept.phtml where you grab $args
//Taken from routes

namespace QuoteModel;

class NewQuoteModel
{
    private $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function getCarMulitplier($id)
    {
        $query = $this->db->prepare("SELECT `type_multiplier` FROM `car_type` WHERE `id` = :id");
        $query->bindParam(':id', $id);
        $query->execute();
        return $query->fetchAll();
    }

    public function getCoverMulitplier($id)
    {
        $query = $this->db->prepare("SELECT `cover_multiplier` FROM `cover_type` WHERE `id` = :id");
        $query->bindParam(':id', $id);
        $query->execute();
        return $query->fetchAll();
    }
}

//The above comes from a Model


namespace SlimAutoCover\Factories;

use Psr\Container\ContainerInterface;
use SlimAutoCover\Models\NewQuoteModel;

class NewQuoteModelFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $db = $container->get('DB');
        return new NewQuoteModel($db);
    }
}

//The above comes from a Model Factory


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

//The above comes from a Model Controller


namespace SlimAutoCover\Factories;

use SlimAutoCover\Controllers\NewQuoteController;
use Psr\Container\ContainerInterface;

class NewQuoteControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
//        $NewQuoteModel = $container->get('NewQuoteModel');
        $renderer = $container->get('renderer');
        return new NewQuoteController($renderer);
    }
}

//The above comes from a Model Controller Factory