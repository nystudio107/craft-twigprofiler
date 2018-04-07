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

namespace nystudio107\twigprofiler\twigextensions;

/**
 * Class ProfilerTwigExtension
 *
 * @author    nystudio107
 * @package   TwigProfiler
 * @since     1.0.0
 */
class ProfilerTwigExtension extends \Twig_Extension
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'twig-profiler';
    }

    /**
     * @inheritdoc
     */
    public function getTokenParsers(): array
    {
        return [
            new ProfilerTokenParser(),
        ];
    }
}
