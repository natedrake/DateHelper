<?php

/**
 * Class DateFormat
 *
 * @author John O'Grady <natedrake>
 * @version 0.1
 * @date 06/07/15
 **/

namespace NateDrake\DateHelper;

class DateFormat
{
    #region const
    const EASY = 'l jS \of F Y h:i:s A';
    const BIG = 'Y-m-d';
    const LITTLE = 'd-m-Y';
    const MIDDLE = 'm-d-Y';
    #endregion

    #region Private Variables
    private static $instance;
    /**
     * The date string
     *
     * @var string
     */
    private $date;

    /**
     * The date format
     *
     * @var string
     */
    private $format;
    #endregion


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
     * @return $this
     */
    public function format($format)
    {
        $this->format = $format;
        return $this;
    }

    /**
     * @return string
     */
    public function run()
    {
        $date = new \DateTime($this->date);
        return $date->format($this->format);
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
     * @return bool|string
     */
    public static function epochDate($epoch)
    {
        return date('r', $epoch);
    }
}