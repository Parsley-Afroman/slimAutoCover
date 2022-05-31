<?php 
namespace SlimAutoCover\Controllers;
use SlimAutoCover\Models\DeleteModel;
use SlimAutoCover\Models\QuotesModel;
use Slim\Views\PhpRenderer;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class DeletePageController
{
    private $renderer;
    private $DeleteModel;
    private $QuotesModel;
    
    public function __construct(PhpRenderer $renderer, DeleteModel $DeleteModel, QuotesModel $QuotesModel)
    {
        $this->renderer = $renderer;
        $this->DeleteModel = $DeleteModel;
        $this->QuotesModel = $QuotesModel;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $formData = $request->getParsedBody();
        $id = $formData['quoteID'];
        $name = $formData['name'];
        $this->DeleteModel->DeleteClient($id);
        $args['quotes'] = $this->QuotesModel->getClientQuotes($name);
        $args['name'] = $name;
        // This isn't working -> likely needs to be routed to delete.phtml (but change to delete.php, and implement a controller that can redirect the page to quotes (reuse already existing functionality?))
        return $this->renderer->render($response,'delete.phtml', $args);
    }
}
?>