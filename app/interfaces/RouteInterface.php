<?php

namespace app\interfaces;

interface RouteInterface
{
    public static function get(string $path, string $action): void;
    public static function post(string $path, string $action): void;
    public static function put(string $path, string $action): void;
    public static function delete(string $path, string $action): void;
}
