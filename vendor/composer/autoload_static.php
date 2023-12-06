<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita6a167b41245650a19fb989dfd34319a
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita6a167b41245650a19fb989dfd34319a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita6a167b41245650a19fb989dfd34319a::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita6a167b41245650a19fb989dfd34319a::$classMap;

        }, null, ClassLoader::class);
    }
}