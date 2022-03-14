<?php
/**
 * Twig Profiler plugin for Craft CMS 3.x
 *
 * Twig Profiler allows you to profile sections of your Twig templates, and see
 * the resulting timings in the Yii2 Debug Toolbar
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) 2018 nystudio107
 */

namespace nystudio107\twigprofiler\services;

use Craft;
use craft\base\Component;
use nystudio107\twigprofiler\TwigProfiler;

/**
 * @author    nystudio107
 * @package   TwigProfiler
 * @since     1.0.0
 */
class Profile extends Component
{
    // Constants
    // =========================================================================
    /**
     * @var string
     */
    public const CATEGORY_PREFIX = 'Twig Profiler';

    // Public Methods
    // =========================================================================
    /**
     * Start logging profiling data
     */
    public function begin(string $profile): void
    {
        Craft::beginProfile(
            $profile,
            Craft::t('twig-profiler', self::CATEGORY_PREFIX)
            .TwigProfiler::$renderingTemplate
        );
    }

    /**
     * End logging profiling data
     */
    public function end(string $profile): void
    {
        Craft::endProfile(
            $profile,
            Craft::t('twig-profiler', self::CATEGORY_PREFIX)
            .TwigProfiler::$renderingTemplate
        );
    }
}
