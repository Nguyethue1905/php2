<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd3584926a539454107edb6dba3786e58
{
    public static $prefixLengthsPsr4 = array (
        's' => 
        array (
            'src\\' => 4,
        ),
        'C' => 
        array (
            'Core\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'src\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Core',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd3584926a539454107edb6dba3786e58::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd3584926a539454107edb6dba3786e58::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd3584926a539454107edb6dba3786e58::$classMap;

        }, null, ClassLoader::class);
    }
}
