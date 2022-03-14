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

use Craft;
use craft\base\Plugin;
use craft\events\TemplateEvent;
use craft\web\View;
use nystudio107\twigprofiler\models\Settings;
use nystudio107\twigprofiler\services\Profile as ProfileService;
use nystudio107\twigprofiler\twigextensions\ProfilerTwigExtension;
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
    // Public Static Properties
    // =========================================================================

    /**
     * @var ?TwigProfiler
     */
    public static ?TwigProfiler $plugin;

    /**
     * @var string The name of the rendering template
     */
    public static string $renderingTemplate = '';

    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public string $schemaVersion = '1.0.0';

    /**
     * @var bool
     */
    public bool $hasCpSection = false;

    /**
     * @var bool
     */
    public bool $hasCpSettings = false;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function __construct($id, $parent = null, array $config = [])
    {
        $config['components'] = [
            'profile' => ProfileService::class,
        ];

        parent::__construct($id, $parent, $config);
    }

    /**
     * @inheritdoc
     */
    public function init(): void
    {
        parent::init();
        self::$plugin = $this;

        /* @var Settings $settings */
        $settings = $this->getSettings();
        Craft::$app->view->registerTwigExtension(new ProfilerTwigExtension());

        if ($settings !== null && $settings->appendTemplateName) {
            // Handler: View::EVENT_BEFORE_RENDER_TEMPLATE
            Event::on(
                View::class,
                View::EVENT_BEFORE_RENDER_TEMPLATE,
                static function (TemplateEvent $event): void {
                    Craft::debug(
                        'View::EVENT_BEFORE_RENDER_TEMPLATE',
                        __METHOD__
                    );
                    self::$renderingTemplate = ' - ' . $event->template;
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
    protected function createSettingsModel(): Settings
    {
        return new Settings();
    }
}
