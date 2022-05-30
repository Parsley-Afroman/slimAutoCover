<?php 
    namespace SlimAutoCover\Factories;

    use App\Abstracts\Controller;
    use Psr\Container\ContainerInterface;
    use SlimAutoCover\Controllers\DeletePageController;
    use SlimAutoCover\Models\DeleteModel;
    use SlimAutoCover\Models\QuotesModel;
    
    class DeletePageControllerFactory
    {
        public function __invoke(ContainerInterface $container)
        {
            $QuotesModel = $container->get('QuotesModel');
            $DeleteModel = $container->get('DeleteModel');
            $renderer = $container->get('renderer');
            return new DeletePageController($renderer, $DeleteModel, $QuotesModel);
        }
    }
?>