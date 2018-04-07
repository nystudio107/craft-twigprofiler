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

/**
 * Twig Profiler config.php
 *
 * This file exists only as a template for the Twig Profiler settings.
 * It does nothing on its own.
 *
 * Don't edit this file, instead copy it to 'craft/config' as 'twig-profiler.php'
 * and make your changes there to override default settings.
 *
 * Once copied to 'craft/config', this file will be multi-environment aware as
 * well, so you can have different settings groups for each environment, just
 * as you do for 'general.php'
 */

return [

    // Controls whether to append the template name to the profile category
    'appendTemplateName' => true,
];
