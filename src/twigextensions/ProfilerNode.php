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

/**
 * Class ProfilerTokenParser
 *
 * @author    nystudio107
 * @package   TwigProfiler
 * @since     1.0.0
 */
class ProfilerNode extends \Twig_Node
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function compile(\Twig_Compiler $compiler)
    {
        $compiler
            ->addDebugInfo($this)
            ->write('$_profile = ')
            ->subcompile($this->getNode('profile'))
            ->raw(";\n")
            ->write("if (\$_profile) {\n")
            ->indent()
            ->write(TwigProfiler::class."::\$plugin->profile->begin(\$_profile);\n")
            ->outdent()
            ->write("}\n")
            ->indent()
            ->subcompile($this->getNode('body'))
            ->outdent()
            ->write("if (\$_profile) {\n")
            ->indent()
            ->write(TwigProfiler::class."::\$plugin->profile->end(\$_profile);\n")
            ->outdent()
            ->write("}\n")
            ->write("unset(\$_profile);\n");
    }
}
