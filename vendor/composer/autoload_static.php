<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3653db4b157a5fac53ba388c7cdf780f
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Facebook\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Facebook\\' => 
        array (
            0 => __DIR__ . '/..' . '/facebook/graph-sdk/src/Facebook',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3653db4b157a5fac53ba388c7cdf780f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3653db4b157a5fac53ba388c7cdf780f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit3653db4b157a5fac53ba388c7cdf780f::$classMap;

        }, null, ClassLoader::class);
    }
}
