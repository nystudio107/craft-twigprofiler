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

use nystudio107\twigprofiler\models\Settings;
use nystudio107\twigprofiler\services\Profile as ProfileService;
use nystudio107\twigprofiler\twigextensions\ProfilerTwigExtension;

use Craft;
use craft\base\Plugin;
use craft\events\TemplateEvent;
use craft\web\View;

use yii\base\Event;

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

    /**
     * @var string The name of the rendering template
     */
    public static $renderingTemplate = '';

    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public string $schemaVersion = '1.0.0';

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init(): void
    {
        parent::init();
        self::$plugin = $this;

        $settings = $this->getSettings();
        Craft::$app->view->registerTwigExtension(new ProfilerTwigExtension());

        if ($settings->appendTemplateName) {
            // Handler: View::EVENT_BEFORE_RENDER_TEMPLATE
            Event::on(
                View::class,
                View::EVENT_BEFORE_RENDER_TEMPLATE,
                function (TemplateEvent $event): void {
                    Craft::debug(
                        'View::EVENT_BEFORE_RENDER_TEMPLATE',
                        __METHOD__
                    );
                    self::$renderingTemplate = ' - '.$event->template;
                }
            );
        }

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
    protected function createSettingsModel(): \nystudio107\twigprofiler\models\Settings
    {
        return new Settings();
    }
}
