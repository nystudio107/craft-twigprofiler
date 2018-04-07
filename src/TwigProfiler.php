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

namespace nystudio107\twigprofiler;

use nystudio107\twigprofiler\services\Profile as ProfileService;
use nystudio107\twigprofiler\twigextensions\ProfilerTwigExtension;
use nystudio107\twigprofiler\models\Settings;

use Craft;
use craft\base\Plugin;

/**
 * Class TwigProfiler
 *
 * @author    nystudio107
 * @package   TwigProfiler
 * @since     1.0.0
 *
 * @property  ProfileService $profile
 */
class TwigProfiler extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * @var TwigProfiler
     */
    public static $plugin;

    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $schemaVersion = '1.0.0';

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        Craft::$app->view->registerTwigExtension(new ProfilerTwigExtension());

        Craft::info(
            Craft::t(
                'twig-profiler',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
    }

    // Protected Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    protected function createSettingsModel()
    {
        return new Settings();
    }
}
