<?php

/**
 *  Class DateTest
 *  @extends PHPUnit_Framework_TestCase
 *
 *  @author John P O'Grady <natedrake>
 *  @date 07-07-15
 **/

use NateDrake\DateHelper\DateFormat;

require_once dirname(dirname(__DIR__)) . '/vendor/autoload.php';

class DateFormatTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @method testBigFormatReturnsYearFirst
     */
    public function testBigFormatReturnsYearFirst()
    {
        $result = DateFormat::get()->date('01-01-2001')->format(DateFormat::BIG)->run();
        $this->assertEquals('2001-01-01 00:00:00', $result);
    }

    public function testEpochReturnsTypeInt()
    {
        $result = DateFormat::epoch();
        $this->assertInternalType('int', $result);
    }
}