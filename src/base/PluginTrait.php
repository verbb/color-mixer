<?php
namespace verbb\colormixer\base;

use verbb\colormixer\ColorMixer;

use verbb\base\LogTrait;
use verbb\base\helpers\Plugin;

trait PluginTrait
{
    // Properties
    // =========================================================================

    public static ?ColorMixer $plugin = null;


    // Traits
    // =========================================================================

    use LogTrait;


    // Static Methods
    // =========================================================================

    public static function config(): array
    {
        Plugin::bootstrapPlugin('color-mixer');

        return [];
    }

}