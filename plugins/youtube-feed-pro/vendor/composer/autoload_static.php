<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit52b6af398106a061d1fa7515059b5519
{
    public static $files = array (
        'sb_ytf_b33e3d135e5d9e47d845c576147bda89' => __DIR__ . '/..' . '/php-di/php-di/src/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Smashballoon\\Stubs\\' => 19,
            'Smashballoon\\Customizer\\' => 24,
            'SmashBalloon\\YoutubeFeed\\Vendor\\Psr\\Container\\' => 46,
            'SmashBalloon\\YoutubeFeed\\Vendor\\PhpDocReader\\' => 45,
            'SmashBalloon\\YoutubeFeed\\Vendor\\Laravel\\SerializableClosure\\' => 60,
            'SmashBalloon\\YoutubeFeed\\Vendor\\Invoker\\' => 40,
            'SmashBalloon\\YoutubeFeed\\Vendor\\DI\\' => 35,
            'SmashBalloon\\YouTubeFeed\\' => 25,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Smashballoon\\Stubs\\' => 
        array (
            0 => __DIR__ . '/..' . '/smashballoon/stubs/src',
        ),
        'Smashballoon\\Customizer\\' => 
        array (
            0 => __DIR__ . '/..' . '/smashballoon/customizer/app',
        ),
        'SmashBalloon\\YoutubeFeed\\Vendor\\Psr\\Container\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/container/src',
        ),
        'SmashBalloon\\YoutubeFeed\\Vendor\\PhpDocReader\\' => 
        array (
            0 => __DIR__ . '/..' . '/php-di/phpdoc-reader/src/PhpDocReader',
        ),
        'SmashBalloon\\YoutubeFeed\\Vendor\\Laravel\\SerializableClosure\\' => 
        array (
            0 => __DIR__ . '/..' . '/laravel/serializable-closure/src',
        ),
        'SmashBalloon\\YoutubeFeed\\Vendor\\Invoker\\' => 
        array (
            0 => __DIR__ . '/..' . '/php-di/invoker/src',
        ),
        'SmashBalloon\\YoutubeFeed\\Vendor\\DI\\' => 
        array (
            0 => __DIR__ . '/..' . '/php-di/php-di/src',
        ),
        'SmashBalloon\\YouTubeFeed\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit52b6af398106a061d1fa7515059b5519::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit52b6af398106a061d1fa7515059b5519::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit52b6af398106a061d1fa7515059b5519::$classMap;

        }, null, ClassLoader::class);
    }
}