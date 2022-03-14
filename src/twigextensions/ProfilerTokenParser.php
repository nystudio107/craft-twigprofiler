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

use Twig\Token;
use Twig\TokenParser\AbstractTokenParser;

/**
 * Class ProfilerTokenParser
 *
 * @author    nystudio107
 * @package   TwigProfiler
 * @since     1.0.1
 */
class ProfilerTokenParser extends AbstractTokenParser
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function getTag(): string
    {
        return 'profile';
    }

    /**
     * @inheritdoc
     */
    public function parse(Token $token): \nystudio107\twigprofiler\twigextensions\ProfilerNode
    {
        $lineno = $token->getLine();
        $stream = $this->parser->getStream();
        $nodes = [
            'profile' => $this->parser->getExpressionParser()->parseExpression(),
        ];
        $stream->expect(Token::BLOCK_END_TYPE);
        $nodes['body'] = $this->parser->subparse(fn(\Twig\Token $token): bool => $this->decideProfilerEnd($token), true);
        $stream->expect(Token::BLOCK_END_TYPE);

        return new ProfilerNode($nodes, [], $lineno, $this->getTag());
    }


    public function decideProfilerEnd(Token $token): bool
    {
        return $token->test('endprofile');
    }
}
