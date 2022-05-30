<?php
declare(strict_types=1);

use Slim\App;


return function (App $app) {

    $app->get('/', 'HomePageController');
    $app->post('/newQuote', 'NewQuotePageController');
    $app->post('/quotes', 'QuotesPageController');
    $app->post('/deleteQuote', 'DeletePageController');
};
