<?php 
namespace SlimAutoCover\Factories;

use Psr\Container\ContainerInterface;
use SlimAutoCover\Models\DeleteModel;

class DeleteModelFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $db = $container->get('DB');
        return new DeleteModel($db);
    }
}
?>