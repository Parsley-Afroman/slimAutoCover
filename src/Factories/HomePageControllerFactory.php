<?php

namespace SlimAutoCover\Factories;

use App\Abstracts\Controller;
use Psr\Container\ContainerInterface;
use SlimAutoCover\Controllers\HomePageController;
use SlimAutoCover\Models\CarTypeModel;

class HomePageControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $carTypeModel = $container->get('CarTypeModel');
        $coverTypeModel = $container->get('CoverTypeModel');
        $renderer = $container->get('renderer');
        return new HomePageController($renderer, $carTypeModel, $coverTypeModel);
    }
}