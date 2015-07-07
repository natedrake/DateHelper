<?php

/**
 * Class DateFormat
 *
 * @author John O'Grady <natedrake>
 * @version dev
 * @date 06/07/15
 **/

namespace NateDrake\DateHelper;

class DateFormat
{
    const EASY = 'l jS \of F Y h:i:s A';
    const BIG = 'Y-m-d';
    const LITTLE = 'd-m-Y';
    const MIDDLE = 'm-d-Y';

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

    public static function get()
    {
        self::$instance = new DateFormat();
        return self::$instance;
    }

    public function date($date)
    {
        $this->date = $date;
        return $this;
    }

    public function format($format)
    {
        $this->format = $format;
        return $this;
    }

    public function run()
    {
        $date = new \DateTime($this->date);
        return $date->format($this->format);
    }
}