<?php
declare(strict_types=1);

use Slim\App;


return function (App $app) {

    $app->get('/', 'HomePageController');
    $app->post('/newQuote', 'NewQuoteController');

//    newQuote -> receives the form POST data -> outputs to accept.phtml where you grab $args

};
