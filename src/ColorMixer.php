<?php
namespace verbb\colormixer;

use verbb\colormixer\base\PluginTrait;
use verbb\colormixer\twigextensions\Extension;

use Craft;
use craft\base\Plugin;

class ColorMixer extends Plugin
{
    // Properties
    // =========================================================================

    public string $schemaVersion = '1.0.0';


    // Traits
    // =========================================================================

    use PluginTrait;


    // Public Methods
    // =========================================================================

    public function init(): void
    {
        parent::init();

        self::$plugin = $this;

        $this->_registerTwigExtensions();
    }


    // Private Methods
    // =========================================================================

    private function _registerTwigExtensions(): void
    {
        Craft::$app->getView()->registerTwigExtension(new Extension);
    }
}
