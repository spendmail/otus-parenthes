<?php
/**
 * Created by PhpStorm.
 * User: spendlively
 * Date: 09.01.18
 * Time: 12:02
 */

namespace ParenthesesTest;

use PHPUnit\Framework\TestCase;
use Parentheses;

class ModelTest extends TestCase
{

    /**
     * @dataProvider isValidTrueProvider
     */
    public function testIsValidTrue($testingString)
    {
        $parenthesesModel = new Parentheses\Model($testingString);

        $this->assertTrue($parenthesesModel->isValid());
    }

    /**
     * @dataProvider isValidExceptionProvider
     */
    public function testIsValidEmptyStringException($testingString, $exception)
    {
        $parenthesesModel = new Parentheses\Model($testingString);

        $this->expectException($exception);

        $parenthesesModel->isValid();
    }

    public function isValidTrueProvider()
    {
        return [
            ["()"],
            ["()))\t\r\n "],
        ];
    }

    public function isValidExceptionProvider()
    {
        return [
            ["", \Parentheses\Exception\EmptyStringException::class],
            ["abc", \Parentheses\Exception\BadSymbolException::class],
            ["abcad'djkasd", \Parentheses\Exception\BadSymbolException::class],
        ];
    }
}
