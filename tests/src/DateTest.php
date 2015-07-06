<?php

/**
* 	Class DateTest
*	@extends \PHPUnit_Framework_TestCase
*	@author John O'Grady
*	@date 06/07/15
*/

require_once dirname(dirname(__DIR__)) .'/vendor/autoload.php';

class DateTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @method testGetOrdinal
     */
	public function testGetOrdinal()
	{
		$expected = array(
			'st' => 1,
			'nd' => 2,
			'rd' => 3,
			'th' => 4,
			'th' => 13,
			'st' => 101
		);
		foreach ($expected as $expect => $val) {
			$result = NateDrake\DateHelper\Date::getOrdinal($val);
			$this->assertEquals($expect, $result, $val);
			$this->assertInternalType('string', $result);
		}
	}

    /**
     * @method testGetDifferenceFromNow
     */
	public function testGetDifferenceFromNow()
	{
        $result = new \DateTime('1970-01-01');
        $this->assertInternalType('string', NateDrake\DateHelper\Date::getDifferenceFromNow($result->format('Y-d-m H:i:s')));
	}

    public function testGetOrdinalLetter()
    {
        $result = NateDrake\DateHelper\Date::getOrdinal('a');
        $this->assertFalse($result);
    }
}   /** End Class Definition **/