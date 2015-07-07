<?php

/**
 *  Class DateTest
 *  @extends PHPUnit_Framework_TestCase
 *
 *  @author John P O'Grady <natedrake>
 *  @date 07-07-15
 **/

use NateDrake\DateHelper\Date;

require_once dirname(dirname(__DIR__)) . '/vendor/autoload.php';

class DateTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @method testOrdinalNumbersReturnCorrectOrdinal
     */
    public function testOrdinalNumbersReturnCorrectOrdinal()
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
            $result = Date::getOrdinal($val);
            $this->assertEquals($exp, $result, $val);
            $this->assertInternalType('string', $result);
        }
    }

    /**
     * @method testGetOrdinalReturnsCorrectOrdinal
     */
    public function testGetOrdinalReturnsCorrectOrdinal()
    {
        $result = Date::getOrdinal(6);
        $this->assertEquals('6th', $result);
    }
}