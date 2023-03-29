<?php

namespace Lok\System\Handlers;

class ViewHandler
{
    public static function getHtml($folderName): string
    {
        return file_get_contents(__DIR__ . "/../../view/$folderName/index.html");
    }
}