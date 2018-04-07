<?php
/**
 * Twig Profiler plugin for Craft CMS 3.x
 *
 * Twig Profiler allows you to profile sections of your Twig templates, and see the resulting timings in the Yii2 Debug Toolbar
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) 2018 nystudio107
 */

namespace nystudio107\twigprofiler\twigextensions;

/**
 * Class ProfilerTokenParser
 * @author    nystudio107
 * @package   TwigProfiler
 * @since     1.0.0
 */
class ProfilerTokenParser extends \Twig_TokenParser
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function getTag()
    {
        return 'profile';
    }

    /**
     * @inheritdoc
     */
    public function parse(\Twig_Token $token)
    {
        $lineno = $token->getLine();
        $stream = $this->parser->getStream();
        $nodes = [
            'profile' => $this->parser->getExpressionParser()->parseExpression(),
        ];
        $stream->expect(\Twig_Token::BLOCK_END_TYPE);
        $nodes['body'] = $this->parser->subparse([$this, 'decideProfilerEnd'], true);
        $stream->expect(\Twig_Token::BLOCK_END_TYPE);

        return new ProfilerNode($nodes, [], $lineno, $this->getTag());
    }


    /**
     * @param \Twig_Token $token
     * @return bool
     */
    public function decideProfilerEnd(\Twig_Token $token): bool
    {
        return $token->test('endprofile');
    }
}
