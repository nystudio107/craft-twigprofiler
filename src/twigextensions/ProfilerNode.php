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

use nystudio107\twigprofiler\TwigProfiler;

use Twig\Compiler;
use Twig\Node\Node;

/**
 * Class ProfilerTokenParser
 *
 * @author    nystudio107
 * @package   TwigProfiler
 * @since     1.0.1
 */
class ProfilerNode extends Node
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function compile(Compiler $compiler)
    {
        $profileName = $this->getNode('profile');
        if ($profileName !== null) {
            $profileName = $profileName->attributes['value'] ?? '';
            if (!empty($profileName)) {
                $compiler
                    ->addDebugInfo($this)
                    ->write(TwigProfiler::class."::\$plugin->profile->begin('".$profileName."');\n")
                    ->indent()
                    ->subcompile($this->getNode('body'))
                    ->outdent()
                    ->write(TwigProfiler::class."::\$plugin->profile->end('".$profileName."');\n");
            }
        }
    }
}
