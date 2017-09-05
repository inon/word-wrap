<?php

namespace Inon\Wrapper;

/**
 * The WordWrap class.
 *
 * @package Inon\WordWrap
 * @author  Inon Baguio <inon.baguio@yahoo.com>
 */
class WordWrap
{

    #----------------------------------------------------------------------------------------------
    # Properties
    #----------------------------------------------------------------------------------------------

    /**
     * @var string
     */
    private $string = '';

    /**
     * @var int
     */
    private $length = 0;

    /**
     * @var array
     */
    private $wordsArray = [];

    /**
     * WordWrap constructor.
     *
     * @param string $string
     * @param int $length
     */
    public function __construct(string $string, int $length)
    {
        $this->string = $string;
        $this->length = $length;

        $this->wordsArray = explode(' ', $this->string);
    }

    #----------------------------------------------------------------------------------------------
    # Class methods
    #----------------------------------------------------------------------------------------------

    /**
     * @return string
     */
    public function handle() : string
    {
        $newWord = $temp = '';

        $arrayLength = count($this->wordsArray);

        for ($i=0; $i < $arrayLength; $i++) {
            if ($i === $arrayLength - 1) {
                $temp = $this->assembleString($this->wordsArray[$i], false);
            } else {
                if (strlen($this->wordsArray[$i] . $this->wordsArray[$i + 1]) <= $this->length) {
                    $temp = $this->assembleString([$this->wordsArray[$i], $this->wordsArray[$i + 1]]);
                    $i++;
                } else {
                    $temp = $this->assembleString($this->wordsArray[$i]);
                }
            }

            $newWord .= $temp;

            $temp = '';
        }

        return $newWord;
    }

    /**
     * @param array|string $word
     *
     * @param bool $newLine
     *
     * @return string
     */
    private function assembleString($word, bool $newLine = true) : string
    {
        $delimiter = $newLine ? "\n" : '';

        if (is_array($word)) {
            return implode('', $word) . "\n";
        }

        return $word . $delimiter;
    }
}
