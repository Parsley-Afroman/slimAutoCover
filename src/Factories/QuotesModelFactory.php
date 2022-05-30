<?php

namespace SlimAutoCover\Factories;

use Psr\Container\ContainerInterface;
use SlimAutoCover\Models\QuotesModel;

class QuotesModelFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $db = $container->get('DB');
        return new QuotesModel($db);
    }
}

?>