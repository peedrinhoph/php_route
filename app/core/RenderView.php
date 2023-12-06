<?php

namespace app\core;

class RenderView
{
    public static function render(string $view, array $params = []): void
    {
        extract($params);

        $path = dirname(__FILE__, 3);
        $filePath = $path . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR;

        if (file_exists($filePath . $view . '.php')) {
            require_once $filePath . $view . '.php';
        } else {
            throw new \Exception("View {$view} not found");
        }
    }
}
