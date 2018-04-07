<?php
/**
 * Twig Profiler plugin for Craft CMS 3.x
 *
 * Twig Profiler allows you to profile sections of your Twig templates, and see the resulting timings in the Yii2 Debug Toolbar
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) 2018 nystudio107
 */

namespace nystudio107\twigprofiler\services;

use Craft;
use craft\base\Component;

/**
 * @author    nystudio107
 * @package   TwigProfiler
 * @since     1.0.0
 */
class Profile extends Component
{
    // Public Methods
    // =========================================================================

    /**
     * Start logging profiling data
     *
     * @param string $profile
     */
    public function begin(string $profile)
    {
        Craft::beginProfile($profile, 'Twig Profiler');
    }

    /**
     * End logging profiling data
     *
     * @param string $profile
     */
    public function end(string $profile)
    {
        Craft::endProfile($profile, 'Twig Profiler');
    }
}
