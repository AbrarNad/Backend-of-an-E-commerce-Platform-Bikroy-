<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4f9509ca2865cf2dc25474fff466ec68
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PostgresqlPhpDemo\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PostgresqlPhpDemo\\' => 
        array (
            0 => __DIR__ . '/../..' . '/helper',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4f9509ca2865cf2dc25474fff466ec68::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4f9509ca2865cf2dc25474fff466ec68::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
