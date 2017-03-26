<?php

/**
 *  Class DateTest
 *  @extends PHPUnit_Framework_TestCase
 *
 *  @author John P O'Grady <natedrake>
 *  @date 07-07-15
 **/

use NateDrake\DateHelper\Date;

class DateTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @method testGetDifferenceFromNow
     */
    public function testGetDifferenceFromNowReturnTypeIsString()
    {
        $result = new \DateTime('1970-01-01');
        $this->assertInternalType('string', Date::differenceFromNow($result->format('Y-d-m H:i:s')));
    }

    /**
     * @method testOrdinalNumbersReturnCorrectOrdinal
     */
    public function testOrdinalNumbersReturnCorrectOrdinalAndType()
    {
        $expected = array(
            "1st" => 1,
            "2nd" => 2,
            "3rd" => 3,
            "4th" => 4,
            "99th" => 99,
            "101st" => 101
        );
        foreach ($expected as $exp => $val) {
            $result = Date::ordinal($val);
            $this->assertEquals($exp, $result, $val);
            $this->assertInternalType('string', $result);
        }
    }

    /**
     * @method testGetOrdinalReturnsCorrectOrdinal
     */
    public function testGetOrdinalReturnsCorrectOrdinal()
    {
        $result = Date::ordinal(6);
        $this->assertEquals('6th', $result);
    }

    /**
     * @method testGetOrdinalLetter
     */
    public function testGetOrdinalReturnsFalseWhenSupplyingLetters()
    {
        $result = Date::ordinal('a');
        $this->assertFalse($result);
    }
}