<?php

/**
 *  @author John O'Grady <natedrake>
 *  @version 1.0.0
 *  @date 06/07/15
 */

namespace NateDrake\DateHelper;

/**
 * Class DateFormat
 * @package NateDrake\DateHelper
 */
class DateFormat
{
    # formats
    const EASY      ='l jS \of F Y h:i:s A';
    const BIG       ='Y-m-d H:i:s';
    const LITTLE    ='d-m-Y H:i:s';
    const MIDDLE    ='m-d-Y H:i:s';
    const SHORT     ='D, d M y H:i:s';
    const ISO8601   ='c';
    const RFC2822   ='r';
    const EPOCH     ='U';

    # units
    const DAY       ='l';
    const MNT       ='M';
    const YEAR      ='Y';

    #misc
    const GMT       ='P';
    const LEAP      ='L';

    /**
     * @var $instance
     */
    private static $instance;
    /**
     * @var string
     */
    private $date;
    /**
     * The date format
     *
     * @var string
     */
    private $format;

    /**
     * @return DateFormat
     */
    public static function get()
    {
        self::$instance = new DateFormat();
        return self::$instance;
    }

    /**
     * @param $date
     * @return $this
     */
    public function date($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @param $format
     * @return string
     */
    public function format($format)
    {
        $this->format = $format;
        $date = new \DateTime($this->date);
        return $date->format($this->format);
    }

    /**
     * @return string
     */
    public function isLeapYear()
    {
        $date=new \DateTime($this->date);
        return $date->format(self::LEAP);
    }

    /**
     * @return int
     */
    public static function epoch()
    {
        return time();
    }

    /**
     * @param int $epoch
     * @param string $type
     * @return bool|string
     */
    public static function epochDate($epoch, $type=null)
    {
        $date = new \DateTime(date('r', $epoch));
        if (!$type){
            return $date->format(static::SHORT);
        } else {
            return $date->format($type);
        }
    }
}