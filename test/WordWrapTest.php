<?php

namespace Inon\WordWrap\Test;

use Inon\Wrapper\WordWrap;

/**
 * The WordWrapTest class.
 *
 * @package Inon\WordWrap\Test
 * @author  Inon Baguio <inon.baguio@yahoo.com>
 */
class WordWrapTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var string
     */
    private $testString = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry';

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();
    }

    /**
     * Compares the return of the WordWrap class against PHP's real wordwrap() function
     *
     * If both are equal, then we know we are doing the right thing
     */
    public function testSample()
    {
        $wrapper = new WordWrap($this->testString, 1);
        $expected = wordwrap($this->testString, 1);

        $this->assertEquals(
            $wrapper->handle(),
            $expected
        );
    }
}
