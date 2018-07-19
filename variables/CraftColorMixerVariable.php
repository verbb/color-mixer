<?php
/**
 * Craft Color Mixer plugin for Craft CMS 3.x
 *
 * A set of Twig filters for modifying hex colors in Craft 3. Ported from https://github.com/ethercreative/colormixer
 *
 * @link      https://www.whoisjuan.me
 * @copyright Copyright (c) 2018 whoisjuan
 */

namespace whoisjuan\craftcolormixer\variables;

use whoisjuan\craftcolormixer\CraftColorMixer;

use Craft;

/**
 * Craft Color Mixer Variable
 *
 * Craft allows plugins to provide their own template variables, accessible from
 * the {{ craft }} global variable (e.g. {{ craft.craftColorMixer }}).
 *
 * https://craftcms.com/docs/plugins/variables
 *
 * @author    whoisjuan
 * @package   CraftColorMixer
 * @since     1.0.0
 */
class CraftColorMixerVariable
{
    // Public Methods
    // =========================================================================

    /**
     * Whatever you want to output to a Twig template can go into a Variable method.
     * You can have as many variable functions as you want.  From any Twig template,
     * call it like this:
     *
     *     {{ craft.craftColorMixer.exampleVariable }}
     *
     * Or, if your variable requires parameters from Twig:
     *
     *     {{ craft.craftColorMixer.exampleVariable(twigValue) }}
     *
     * @param null $optional
     * @return string
     */
    public function exampleVariable($optional = null)
    {
        $result = "And away we go to the Twig template...";
        if ($optional) {
            $result = "I'm feeling optional today...";
        }
        return $result;
    }
}
