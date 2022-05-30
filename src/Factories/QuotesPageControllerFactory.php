<?php 
namespace SlimAutoCover\Factories;

use App\Abstracts\Controller;
use Psr\Container\ContainerInterface;
use SlimAutoCover\Controllers\QuotesPageController;
use Models\QuotesModel;

class QuotesPageControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $renderer = $container->get('renderer');
        $QuotesModel = $container->get('QuotesModel');
        return new QuotesPageController($renderer, $QuotesModel);
    }
}
?>