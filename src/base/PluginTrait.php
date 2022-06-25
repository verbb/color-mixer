<?php
namespace verbb\colormixer\base;

use Craft;

use yii\log\Logger;

use verbb\base\BaseHelper;

trait PluginTrait
{
    // Static Properties
    // =========================================================================

    public static $plugin;


    // Public Methods
    // =========================================================================

    public static function log($message, $attributes = []): void
    {
        if ($attributes) {
            $message = Craft::t('color-mixer', $message, $attributes);
        }

        Craft::getLogger()->log($message, Logger::LEVEL_INFO, 'color-mixer');
    }

    public static function error($message, $attributes = []): void
    {
        if ($attributes) {
            $message = Craft::t('color-mixer', $message, $attributes);
        }

        Craft::getLogger()->log($message, Logger::LEVEL_ERROR, 'color-mixer');
    }


    // Private Methods
    // =========================================================================

    private function _setPluginComponents(): void
    {
        BaseHelper::registerModule();
    }

    private function _setLogging(): void
    {
        BaseHelper::setFileLogging('color-mixer');
    }

}