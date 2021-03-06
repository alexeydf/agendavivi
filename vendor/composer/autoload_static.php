<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc9eb697e1f3dc40a56d8d3f7a657e3e4
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitc9eb697e1f3dc40a56d8d3f7a657e3e4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc9eb697e1f3dc40a56d8d3f7a657e3e4::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc9eb697e1f3dc40a56d8d3f7a657e3e4::$classMap;

        }, null, ClassLoader::class);
    }
}
