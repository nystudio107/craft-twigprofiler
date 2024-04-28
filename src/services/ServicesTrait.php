<?php
/**
 * Twig Profiler plugin for Craft CMS
 *
 * Twig Profiler allows you to profile sections of your Twig templates, and see
 * the resulting timings in the Yii2 Debug Toolbar
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) nystudio107
 */

namespace nystudio107\twigprofiler\services;

use craft\helpers\ArrayHelper;
use nystudio107\twigprofiler\services\Profile as ProfileService;
use yii\base\InvalidConfigException;

/**
 * @author    nystudio107
 * @package   TwigProfiler
 * @since     1.0.0
 *
 * @property  ProfileService $profile
 */
trait ServicesTrait
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function __construct($id, $parent = null, array $config = [])
    {
        // Merge in the passed config, so it our config can be overridden by Plugins::pluginConfigs['vite']
        // ref: https://github.com/craftcms/cms/issues/1989
        $config = ArrayHelper::merge([
            'components' => [
                'profile' => ProfileService::class,
            ],
        ], $config);

        parent::__construct($id, $parent, $config);
    }

    /**
     * Returns the profile service
     *
     * @return ProfileService The profile service
     * @throws InvalidConfigException
     */
    public function getProfile(): ProfileService
    {
        return $this->get('profile');
    }
}
