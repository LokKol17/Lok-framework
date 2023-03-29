<?php

namespace Lok\System\Handlers;

class HandleHtml
{
    private \DOMDocument $dom;

    public static function getHtml(mixed $controller): string
    {
        $controller = new $controller();
        return $controller->index();
    }

    private function applyCss(string $folderName): void
    {
        $cssFiles = scandir(__DIR__ . "/../../public/css/$folderName/");
        $cssFiles = array_diff($cssFiles, ['.', '..']);
        foreach ($cssFiles as $cssFile) {
            $css = "/css/$folderName/$cssFile";
            $link = $this->dom->createElement('link');
            $link->setAttribute('rel', 'stylesheet');
            $link->setAttribute('href', $css);
            $this->dom->getElementsByTagName('head')[0]->appendChild($link);
        }

    }

    public function applyContents(string $folderName, array $data = []): string
    {
        $html = ViewHandler::getHtml($folderName);
        $html = $this->applyData($html, $data);

        $this->createDomAndLoadHtml($html);
        $this->applyCss($folderName);
        return $this->dom->saveHTML();
    }

    private function applyData(string $html, array $data): array|false|string
    {
        foreach ($data as $key => $value) {
            $html = str_replace("{{ $key }}", $value, $html);
        }
        return $html;
    }


    public function createDomAndLoadHtml(string $html): void
    {
        $dom = new \DOMDocument();
        libxml_use_internal_errors(false);
        $dom->loadHTML($html);
        libxml_use_internal_errors(true);
        $this->dom = $dom;
    }
}