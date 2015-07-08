<?php

/**
 * Class Date
 *
 * @author John O'Grady <natedrake>
 * @version 0.1
 * @date 06/07/15
 **/

namespace NateDrake\DateHelper;

class Date
{
    /**
     *  instance of this class
     */
    private static $instance;

    /**
     * @var array
     */
    private static $ordinals = array('th', 'st', 'nd', 'rd', 'th', 'th', 'th', 'th', 'th', 'th');

    /**
     *  A string containing difference in time e.g [ 1year 8months 5days 12hours 42minutes 32seconds ]
     *
     * @var string
     */
    private $sDifference;

    public static function get()
    {
        self::$instance = new Date();
        return self::$instance;
    }

    public function difference($string)
    {
        $this->sDifference .= $string;
    }

    public function reset()
    {
        $this->sDifference = null;
    }

    /**
     * @method getDifferenceFromNow
     * @access public
     * @param $date
     * @return string
     */
    public function getDifferenceFromNow($date)
    {
        $then = date_create($date);
        $now = date_create(date('Y-m-d H:i:s'));
        $diff = date_diff($then, $now);

        $this->reset();
        if ($diff->format('%y') >= 1) {
            $this->difference($diff->format("%y years ago"));
        }
        if ($diff->format('%m') >= 1) {
            if ($diff->format('%m') < 2) {
                $this->difference($diff->format('%m month ago'));
            }
            $this->difference($diff->format("%m months ago"));
        }
        if ($diff->format('%h') >= 1) {
            $this->difference($diff->format("%h hours ago"));
        }
        if ($diff->format('%i') >= 1) {
            $this->difference($diff->format("%i minutes ago"));
        }
        if ($diff->format('%s') >= 1) {
            if ($diff->format('%s') < 2) {
                $this->difference($diff->format("%s second ago"));
            } else {
                $this->difference($diff->format("%s seconds ago"));
            }
        }
        return $this->sDifference;
    }

    public function time($date)
    {
        $then = date_create($date);
        $now = date_create(date('Y-m-d H:i:s'));
        $diff = date_diff($then, $now);

        if ($diff->format('%y') >= 1) {
            return $diff->format("%y years ago");
        }
        if ($diff->format('%m') >= 1) {
            if ($diff->format('%m') < 2) {
                return $diff->format('%m month ago');
            }
            return $diff->format("%m months ago");
        }

        if ($diff->format('%d') >= 1) {
            switch (true) {
                case ($diff->format('%d') >= 14 && $diff->format('%d') < 15):
                    return "about a fortnight ago";
                    break;
                case ($diff->format('%d') >= 7 && $diff->format('%d') < 8):
                    return "about a week ago";
                    break;
                case ($diff->format('%d') > 5 && $diff->format('%d') < 7):
                    return "less than a week ago";
                    break;
                case ($diff->format('%d') < 2):
                    return $diff->format('%d day ago');
                    break;
                default:
                    return $diff->format('%d days ago');
                    break;
            }
        }
        if ($diff->format('%i') >= 30 && $diff->format('%i') <= 35) {
            return "half an hour ago";
        } elseif ($diff->format('%i') < 2) {
            return $diff->format("%i minute ago");
        }
        if ($diff->format('%s') < 2) {
            return $diff->format("%s second ago");
        } else {
            return $diff->format("%s seconds ago");
        }
    }

    /**
     * @method getOrdinal
     * @access public
     * @param $num
     * @return string
     */
    public function getOrdinal($num)
    {
        if (!(preg_match('/[^\d]/', $num))) {
            $num = (int)$num;
        }
        if (is_int($num)) {
            if ((($num % 100) >= 11) && (($num % 100) <= 13)) {
                return $num . 'th';
            } else {
                return $num . self::$ordinals[$num % 10];
            }
        } else {
            return false;
        }
    }
}