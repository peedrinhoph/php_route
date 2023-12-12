<?php

namespace app\core;

use League\Plates\Engine;
class RenderView
{
    public static function render(string $view, array $params = []): void
    {
        extract($params);

        // $path = dirname(__FILE__, 3);
        $filePath = base_path() . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR;

        if (!file_exists($filePath . $view . '.php')) {
            throw new \Exception("View {$view} does not exist");
        }

        $templates = new Engine($filePath);
        echo $templates->render($view, $params);

        // if (file_exists($filePath . $view . '.php')) {
        //     require_once $filePath . $view . '.php';
        // } else {
        //     throw new \Exception("View {$view} not found");
        // }
    }
}
