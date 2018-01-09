<?php
/**
 * Created by PhpStorm.
 * User: spendlively
 * Date: 09.01.18
 * Time: 10:48
 */

namespace Parentheses\Exception;


class EmptyStringException extends \Exception
{

    protected $message = 'The string is empty';
}
