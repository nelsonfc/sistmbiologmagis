<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd8ae02e20465983c1cff66b2c2ea064f
{
    public static $files = array (
        '2cffec82183ee1cea088009cef9a6fc3' => __DIR__ . '/..' . '/ezyang/htmlpurifier/library/HTMLPurifier.composer.php',
    );

    public static $prefixLengthsPsr4 = array (
        'y' => 
        array (
            'yii\\composer\\' => 13,
            'yii\\bootstrap\\' => 14,
            'yii\\' => 4,
        ),
        'r' => 
        array (
            'rmrevin\\yii\\fontawesome\\' => 24,
        ),
        'd' => 
        array (
            'dmstr\\' => 6,
        ),
        'c' => 
        array (
            'cebe\\markdown\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'yii\\composer\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2-composer',
        ),
        'yii\\bootstrap\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2-bootstrap',
        ),
        'yii\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2',
        ),
        'rmrevin\\yii\\fontawesome\\' => 
        array (
            0 => __DIR__ . '/..' . '/rmrevin/yii2-fontawesome',
        ),
        'dmstr\\' => 
        array (
            0 => __DIR__ . '/..' . '/dmstr/yii2-adminlte-asset',
        ),
        'cebe\\markdown\\' => 
        array (
            0 => __DIR__ . '/..' . '/cebe/markdown',
        ),
    );

    public static $prefixesPsr0 = array (
        'c' => 
        array (
            'cebe\\gravatar\\' => 
            array (
                0 => __DIR__ . '/..' . '/cebe/yii2-gravatar',
            ),
        ),
        'H' => 
        array (
            'HTMLPurifier' => 
            array (
                0 => __DIR__ . '/..' . '/ezyang/htmlpurifier/library',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd8ae02e20465983c1cff66b2c2ea064f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd8ae02e20465983c1cff66b2c2ea064f::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitd8ae02e20465983c1cff66b2c2ea064f::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
