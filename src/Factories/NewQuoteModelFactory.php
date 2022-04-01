<?php

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