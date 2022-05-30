<?php
namespace SlimAutoCover\Factories;

use App\Abstracts\Controller;
use Psr\Container\ContainerInterface;
use SlimAutoCover\Controllers\NewQuotePageController;
use SlimAutoCover\Models\CarTypeModel;

class NewQuotePageControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $carTypeModel = $container->get('CarTypeModel');
        $coverTypeModel = $container->get('CoverTypeModel');
        $renderer = $container->get('renderer');
        return new NewQuotePageController($renderer, $carTypeModel, $coverTypeModel);
    }
}
?>