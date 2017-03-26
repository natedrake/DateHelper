# DateHelper
[![Build Status](https://travis-ci.org/natedrake/DateHelper.svg?branch=master)](https://travis-ci.org/natedrake/datehelper)
[![Latest Stable Version](https://poser.pugx.org/natedrake/datehelper/v/stable)](https://packagist.org/packages/natedrake/datehelper)
[![Latest Unstable Version](https://poser.pugx.org/natedrake/datehelper/v/unstable)](https://packagist.org/packages/natedrake/datehelper) 
[![License](https://poser.pugx.org/natedrake/datehelper/license)](https://packagist.org/packages/natedrake/datehelper)
[![composer.lock](https://poser.pugx.org/natedrake/datehelper/composerlock)](https://packagist.org/packages/natedrake/datehelper)

[![Total Downloads](https://poser.pugx.org/natedrake/datehelper/downloads)](https://packagist.org/packages/natedrake/datehelper)
[![Monthly Downloads](https://poser.pugx.org/natedrake/datehelper/d/monthly)](https://packagist.org/packages/natedrake/datehelper)
[![Daily Downloads](https://poser.pugx.org/natedrake/datehelper/d/daily)](https://packagist.org/packages/natedrake/datehelper)

## Manipulate PHP Date


### Install

To install this package add it as a dependency using composer

``composer.json``
````$json
"require": {
    "natedrake/datehelper": "^0.1.4"
}
````

### Usage

````php
<?php

use Natedrake\DateHelper\Date;
use Natedrake\DateHelper\DateFormat;

$datePosted=date('2015-08-02 10:36:15');
$date=Date::get()->getDifferenceFromNow($datePosted);

````

> returns the amount of time since the date provided in date posted.  
E.g. 10 seconds ago, less than a minute ago, a week ago, 3 weeks ago, a fortnight ago, etc

### Classes

#### Natedrake\DateHelper\Date

##### Usage:
````php
$ordinal=Date::<function>([parameter]);
````

##### Example:
````php
$ordinal=Date::ordinal(12);
````
> returns '12th'

##### Methods:

````php
Date::differenceFromNow($date);
````
> returns the difference since the provided date.  E.g 10 seconds ago, a week ago, a fortnight, ago, 3 weeks ago, etc

````php
Date::ordinal($number);
````
>returns the ordinal for the number provided.  E.g. 1st, 10th, 3rd, etc.

#### Natedrake\DateHelper\DateFormat

##### Usage:

````php
DateFormat::get()->date(<date>)-><function>([paramater]);
````

##### Example:
````php
$isLeapYear=DateFormat::get()->date('2012-01-01')->isLeapYear();
````
> returns true, or false if year of date isn't a leap year

##### Methods:

````php
DateFormat::get();
````
> returns a DateFormat object to use

````php
DateFormat::get()->date($date);
````
> set the date of the date format object

````php
DateFormat::get()->date($date)->format('Y-m-d H:i:s);
````
> returns the date in the provided format.

````php
DateFormat::get()->date($date)->format(DateFormat::ISO8601);
````
> There are a list of predefined formats in the DateFormat class.
````php
DateFormat::EASY        *25th of March 2016 09:00:00 AM*
DateFormat::BIG         *2016-03-25 09:00:00*
DateFormat::LITTLE      *25-03-2016 09:00:00*
DateFormat::MIDDLE      *03-25-2016 09:00:00*
DateFormat::ISO8601     *2016-03-25T09:00:00+01:00*
DateFormat::RFC2822     *Fri, 25 Mar 2016 09:00:00 +0100*
DateFormat::EPOCH       *1458892800*

DateFormat::DAY         *Friday*
DateFormat::MNT         *Mar*
DateFormat::YEAR        *2016*

DateFormat::GMT         *+01:00* // Time zone difference from GMT
DateFormat::LEAP        *1*      // Returns 1 if year is a leap year
````