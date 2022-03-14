<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfe2bdbcf8fc687c5684ec2e5fc98c84a
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stripe\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stripe\\' => 
        array (
            0 => __DIR__ . '/..' . '/stripe/stripe-php/lib',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitfe2bdbcf8fc687c5684ec2e5fc98c84a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitfe2bdbcf8fc687c5684ec2e5fc98c84a::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
