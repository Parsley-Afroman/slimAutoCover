<?php

namespace SlimAutoCover\Factories;

use SlimAutoCover\Controllers\NewQuoteController;
use Psr\Container\ContainerInterface;

class NewQuoteControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $NewQuoteModel = $container->get('NewQuoteModel');
        $renderer = $container->get('renderer');
        return new NewQuoteController ($renderer, $NewQuoteModel);
    }
}