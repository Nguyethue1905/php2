<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit767856a8bf773c55104fc68ec9a00588
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit767856a8bf773c55104fc68ec9a00588', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit767856a8bf773c55104fc68ec9a00588', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit767856a8bf773c55104fc68ec9a00588::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
