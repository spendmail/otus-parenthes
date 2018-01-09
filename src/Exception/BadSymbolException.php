<?php
/**
 * Created by PhpStorm.
 * User: spendlively
 * Date: 09.01.18
 * Time: 10:48
 */

namespace Parentheses\Exception;


class BadSymbolException extends \Exception
{
    protected $message = 'Checking string must contain only symbols: "() \n\t\r';
}
