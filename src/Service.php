<?php
/**
 * Created by PhpStorm.
 * User: spendlively
 * Date: 09.01.18
 * Time: 10:47
 */

namespace Parentheses;

class Service implements ServiceInterface
{
    public $parenthesesModel;

    public function __construct(Model $parenthesesModel)
    {

        $this->setParenthesesSequence($parenthesesModel);
    }

    public function setParenthesesSequence(Model $parenthesesModel)
    {
        $this->parenthesesModel = $parenthesesModel;
    }

    /**
     * Returns true, if parentheses sequence is correct
     *
     * @return bool
     */
    function isCorrect(): bool
    {

        $string = $this->parenthesesModel->getString();
        $length = $this->parenthesesModel->getLength();

        $counter = 0;

        for ($i = 0; $i < $length; $i++) {

            switch ($string[$i]) {

                case "(":
                    $counter++;
                    break;

                case ")":
                    $counter--;
            }

            if ($counter < 0) {
                return false;
            }
        }

        return $counter === 0;
    }
}
