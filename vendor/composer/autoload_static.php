<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbc892aa014ff629994f6dda547e45662
{
    public static $files = array (
        '757772e28a0943a9afe83def8db95bdf' => __DIR__ . '/..' . '/mf2/mf2/Mf2/Parser.php',
        '4944cc37acfce246a121e7126c40a396' => __DIR__ . '/../..' . '/utils/sendMastodon.php',
        'd5e1b7e618997cbe5a51ad1bf6197ee6' => __DIR__ . '/../..' . '/utils/sendWebmention.php',
        '90d4decb5eec1aeaa6874e62d5b30d1c' => __DIR__ . '/../..' . '/utils/receiveKomment.php',
        '1b0fa1c44462bbc4ae81202d4687b4b1' => __DIR__ . '/../..' . '/utils/moderation.php',
        '72118f495fa13d093fb50bf5406d8571' => __DIR__ . '/../..' . '/utils/base.php',
    );

    public static $prefixLengthsPsr4 = array (
        'K' => 
        array (
            'Kirby\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Kirby\\' => 
        array (
            0 => __DIR__ . '/..' . '/getkirby/composer-installer/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'I' => 
        array (
            'IndieWeb' => 
            array (
                0 => __DIR__ . '/..' . '/indieweb/mention-client/src',
            ),
        ),
    );

    public static $classMap = array (
        'IndieWeb\\MentionClient' => __DIR__ . '/..' . '/indieweb/mention-client/src/IndieWeb/MentionClient.php',
        'IndieWeb\\MentionClientTest' => __DIR__ . '/..' . '/indieweb/mention-client/src/IndieWeb/MentionClientTest.php',
        'Kirby\\ComposerInstaller\\CmsInstaller' => __DIR__ . '/..' . '/getkirby/composer-installer/src/ComposerInstaller/CmsInstaller.php',
        'Kirby\\ComposerInstaller\\Installer' => __DIR__ . '/..' . '/getkirby/composer-installer/src/ComposerInstaller/Installer.php',
        'Kirby\\ComposerInstaller\\Plugin' => __DIR__ . '/..' . '/getkirby/composer-installer/src/ComposerInstaller/Plugin.php',
        'Kirby\\ComposerInstaller\\PluginInstaller' => __DIR__ . '/..' . '/getkirby/composer-installer/src/ComposerInstaller/PluginInstaller.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbc892aa014ff629994f6dda547e45662::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbc892aa014ff629994f6dda547e45662::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitbc892aa014ff629994f6dda547e45662::$prefixesPsr0;
            $loader->classMap = ComposerStaticInitbc892aa014ff629994f6dda547e45662::$classMap;

        }, null, ClassLoader::class);
    }
}
