<?php

use Lok\Framework\Http\Controller\Example\ExampleController;

require_once __DIR__ . "/../../vendor/autoload.php";

//Rotas são criadas no formato "path" => controller::class

return [
    "/example" => new ExampleController(),
];