<?php

namespace SlimAutoCover\Factories;

use Psr\Container\ContainerInterface;
use SlimAutoCover\Models\CarTypeModel;

class CaryTypeModelFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $db = $container->get('DB');
        return new CarTypeModel($db);
    }
}