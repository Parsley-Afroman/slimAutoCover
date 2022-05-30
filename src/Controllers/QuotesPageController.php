<?php 
namespace SlimAutoCover\Controllers;
use SlimAutoCover\Models\QuotesModel;
use Slim\Views\PhpRenderer;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
session_start();

class QuotesPageController
{
    private $renderer;
    private $QuotesModel;
    
    public function __construct(PhpRenderer $renderer, QuotesModel $QuotesModel)
    {
        $this->renderer = $renderer;
        $this->QuotesModel = $QuotesModel;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $formData = $request->getParsedBody();
        $name = $formData['fullName'];
        $quote = $formData['quote'];
        $carType = $formData['carType'];
        $coverType = $formData['coverType'];
        if(isset($_POST['accept']))
        {
        $this->QuotesModel->putClientQuote($name, $carType, $coverType, $quote);
        };
        $args['quotes'] = $this->QuotesModel->getClientQuotes($name);
        $args['name'] = $name;
        $_SESSION['quotes'] = $this->QuotesModel->getClientQuotes($name);
        $_SESSION['name'] = $name;
        return $this->renderer->render($response,'quotes.phtml', $args);
    }
}
?>