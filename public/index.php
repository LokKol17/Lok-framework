<?php

use Lok\System\Handlers\HandleHtml;
use Lok\System\Handlers\UriHandler;

require_once "../vendor/autoload.php";

function view(string $folderName, array $data = []): string
{
    $html = new HandleHtml();
    return $html->applyContents($folderName, $data);
}

$uri = $_SERVER['REQUEST_URI'];
if ($uri === '/') {
    $uri = '/example';
}

$controller = UriHandler::getController($uri);
echo (new $controller())->index();