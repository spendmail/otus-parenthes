<?php
/**
 * Created by PhpStorm.
 * User: spendlively
 * Date: 09.01.18
 * Time: 10:44
 */

namespace Parentheses;

use Parentheses\Exception;

class Model
{
    const VALID_CHARACTERS = "() \n\t\r";

    protected $string = '';

    public function __construct(string $string)
    {
        $this->setString($string);
    }

    /**
     * Setter for $this->string
     *
     * @param string $string
     */
    public function setString(string $string)
    {
        $this->string = $string;
    }

    /**
     * Getter for $this->string
     *
     * @return string
     */
    public function getString(): string
    {
        return $this->string;
    }

    /**
     * Returns a length of $this->string
     *
     * @return int
     */
    public function getLength(): int
    {
        return strlen($this->getString());
    }

    /**
     * Returns true, if $this->string corresponds to the self::VALID_CHARACTERS characters
     *
     * @return bool
     * @throws Exception\BadSymbolException
     * @throws Exception\EmptyStringException
     */
    public function isValid()
    {
        $string = $this->getString();
        $length = $this->getLength();

        if ($length === 0) throw new Exception\EmptyStringException();

        for ($i = 0; $i < $length; $i++) {
            if(strpos(self::VALID_CHARACTERS, $string[$i]) === false){
                throw new Exception\BadSymbolException();
            }
        }

        return true;
    }
}
