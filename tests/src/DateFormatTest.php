<?php

/**
 *  @author John O'Grady <natedrake>
 *  @date 07-07-15
 */

use NateDrake\DateHelper\DateFormat;

/**
 * Class DateFormatTest
 */
class DateFormatTest extends \PHPUnit_Framework_TestCase
{
    /**
     *  @return void
     */
    public function testDateFormat()
    {
        $result=DateFormat::get()->date('2001-01-01 00:10:01')->format(DateFormat::BIG);
        echo $result;
        $this->assertEquals('2001-01-01 00:10:01', $result);
    }
    /**
     *  @return void
     */
    public function testBigFormatReturnsYearFirst()
    {
        $result = DateFormat::get()->date('01-01-2001')->format(DateFormat::BIG);
        $this->assertEquals('2001-01-01 00:00:00', $result);
    }

    /**
     *  @return void
     */
    public function testEpochReturnsTypeInt()
    {
        $result = DateFormat::epoch();
        $this->assertInternalType('int', $result);
    }

    /**
     *  @return void
     */
    public function testEpochOnDate()
    {
        $iPast=(int)DateFormat::get()->date('2015-05-07 10:21:00')->format(DateFormat::EPOCH);
        $iNow=(int)DateFormat::epoch();
        $result=($iNow-$iPast);
        $this->assertGreaterThan(0, $result);
    }
}