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

use nystudio107\twigprofiler\services\Profile as ProfileService;
use yii\base\InvalidConfigException;

/**
 * @author    nystudio107
 * @package   Twig Profiler
 * @since     4.0.1
 *
 * @property  ProfileService $profile
 */
trait ServicesTrait
{
    // Public Static Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public static function config(): array
    {
        return [
            'components' => [
                'profile' => ProfileService::class,
            ],
        ];
    }

    // Public Methods
    // =========================================================================

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
