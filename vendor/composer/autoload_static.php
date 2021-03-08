<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit191e507b57690d7050630bd40ae4e4fc
{
    public static $files = array (
        'decc78cc4436b1292c6c0d151b19445c' => __DIR__ . '/..' . '/phpseclib/phpseclib/phpseclib/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'p' => 
        array (
            'phpseclib\\' => 10,
        ),
        'c' => 
        array (
            'chriskacerguis\\RestServer\\' => 26,
        ),
        'P' => 
        array (
            'PhpAmqpLib\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'phpseclib\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpseclib/phpseclib/phpseclib',
        ),
        'chriskacerguis\\RestServer\\' => 
        array (
            0 => __DIR__ . '/..' . '/chriskacerguis/codeigniter-restserver/src',
        ),
        'PhpAmqpLib\\' => 
        array (
            0 => __DIR__ . '/..' . '/php-amqplib/php-amqplib/PhpAmqpLib',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit191e507b57690d7050630bd40ae4e4fc::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit191e507b57690d7050630bd40ae4e4fc::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
