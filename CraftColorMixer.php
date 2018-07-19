<?php
/**
 * Craft Color Mixer plugin for Craft CMS 3.x
 *
 * A set of Twig filters for modifying hex colors in Craft 3. Ported from https://github.com/ethercreative/colormixer
 *
 * @link      https://www.whoisjuan.me
 * @copyright Copyright (c) 2018 whoisjuan
 */

namespace whoisjuan\craftcolormixer;

use whoisjuan\craftcolormixer\variables\CraftColorMixerVariable;
use whoisjuan\craftcolormixer\twigextensions\CraftColorMixerTwigExtension;

use Craft;
use craft\base\Plugin;
use craft\services\Plugins;
use craft\events\PluginEvent;
use craft\web\twig\variables\CraftVariable;

use yii\base\Event;

/**
 * Craft plugins are very much like little applications in and of themselves. We’ve made
 * it as simple as we can, but the training wheels are off. A little prior knowledge is
 * going to be required to write a plugin.
 *
 * For the purposes of the plugin docs, we’re going to assume that you know PHP and SQL,
 * as well as some semi-advanced concepts like object-oriented programming and PHP namespaces.
 *
 * https://craftcms.com/docs/plugins/introduction
 *
 * @author    whoisjuan
 * @package   CraftColorMixer
 * @since     1.0.0
 *
 */
class CraftColorMixer extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * Static property that is an instance of this plugin class so that it can be accessed via
     * CraftColorMixer::$plugin
     *
     * @var CraftColorMixer
     */
    public static $plugin;

    // Public Properties
    // =========================================================================

    /**
     * To execute your plugin’s migrations, you’ll need to increase its schema version.
     *
     * @var string
     */
    public $schemaVersion = '1.0.0';

    // Public Methods
    // =========================================================================

    /**
     * Set our $plugin static property to this class so that it can be accessed via
     * CraftColorMixer::$plugin
     *
     * Called after the plugin class is instantiated; do any one-time initialization
     * here such as hooks and events.
     *
     * If you have a '/vendor/autoload.php' file, it will be loaded for you automatically;
     * you do not need to load it in your init() method.
     *
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        // Add in our Twig extensions
        Craft::$app->view->registerTwigExtension(new CraftColorMixerTwigExtension());

        // Register our variables
        Event::on(
            CraftVariable::class,
            CraftVariable::EVENT_INIT,
            function (Event $event) {
                /** @var CraftVariable $variable */
                $variable = $event->sender;
                $variable->set('craftColorMixer', CraftColorMixerVariable::class);
            }
        );

        // Do something after we're installed
        Event::on(
            Plugins::class,
            Plugins::EVENT_AFTER_INSTALL_PLUGIN,
            function (PluginEvent $event) {
                if ($event->plugin === $this) {
                    // We were just installed
                }
            }
        );

/**
 * Logging in Craft involves using one of the following methods:
 *
 * Craft::trace(): record a message to trace how a piece of code runs. This is mainly for development use.
 * Craft::info(): record a message that conveys some useful information.
 * Craft::warning(): record a warning message that indicates something unexpected has happened.
 * Craft::error(): record a fatal error that should be investigated as soon as possible.
 *
 * Unless `devMode` is on, only Craft::warning() & Craft::error() will log to `craft/storage/logs/web.log`
 *
 * It's recommended that you pass in the magic constant `__METHOD__` as the second parameter, which sets
 * the category to the method (prefixed with the fully qualified class name) where the constant appears.
 *
 * To enable the Yii debug toolbar, go to your user account in the AdminCP and check the
 * [] Show the debug toolbar on the front end & [] Show the debug toolbar on the Control Panel
 *
 * http://www.yiiframework.com/doc-2.0/guide-runtime-logging.html
 */
        Craft::info(
            Craft::t(
                'craft-color-mixer',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
    }

    public function getName()
	{
		return Craft::t('Color Mixer');
	}
	public function getVersion()
	{
		return '1.1.1';
	}
	public function getSchemaVersion()
	{
		return '0.0.1';
	}
	public function getDeveloper()
	{
		return 'whoisjuan, based on the work of Ether Creative';
	}
	public function getDeveloperUrl()
	{
		return 'https://www.whoisjuan.me';
	}
	public function getDocumentationUrl()
	{
		return 'https://github.com/ethercreative/ColorMixer/blob/master/readme.md';
	}
	public function getDescription()
	{
		return 'A set of Twig filters for modifying HEX colors in Craft 3';
	}
	public function hasCpSection()
	{
		return false;
	}
	public function addTwigExtension()
	{
		Craft::import('plugins.colormixer.twigextensions.ColorMixerTwigExtension');
		return new ColorMixerTwigExtension();
	}
	public function getReleaseFeedUrl()
	{
		return 'https://raw.githubusercontent.com/whoisjuan/craft-color-mixer/master/CHANGELOG.md';
	}

    // Protected Methods
    // =========================================================================

}
