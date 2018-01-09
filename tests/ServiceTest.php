<?php
/**
 * Created by PhpStorm.
 * User: spendlively
 * Date: 09.01.18
 * Time: 14:29
 */

namespace ParenthesesTest;

use PHPUnit\Framework\TestCase;
use Parentheses;

class ServiceTest extends TestCase
{

    /**
     * @dataProvider isCorrectTrueProvider
     */
    public function testIsCorrectTrue($testingString, $result)
    {

        $parenthesesModel = new Parentheses\Model($testingString);
        $parenthesesService = new Parentheses\Service($parenthesesModel);

        $this->assertEquals($parenthesesService->isCorrect(), $result);
    }

    public function isCorrectTrueProvider()
    {
        return [
            ["()", true],
            ["((()))", true],
            ["() (()) (()()) ()(())((()))  \t\r\n ", true],
            ["(()()()(())) ((((()()()))(()()()(((()))))))", true],
            ["(()()()()))((((()()()))(()()()(((()))))))", false],
            ["(()()()())))((((()()()))(()()()(((()))))))", false],
        ];
    }
}
