<?php

/**
 * Test iday of the week replacing.
 *
 * @package  DateTimeCzech
 * @author   Jakub Rychecký <jakub@rychecky.cz>
 */

use PHPUnit\Framework\TestCase;
use DateTimeCzech\DateTimeCzech;

class DayTest extends TestCase
{

    /**
     * Test SHORT name of the day of the week in date format is alright.
     *
     * @throws \Exception
     * @return void
     */
    public function testDayNameShort()
    {
        $date = new DateTimeCzech('2040-01-01');

        $this->assertEquals($date->format('D[cz]'), 'ne');
        $this->assertEquals($date->format('j.n.Y D[cz]'), '1.1.2040 ne');

        // Flexes have no affect on short form
        $this->assertEquals($date->format('D[cz]', 4), 'ne');
    }

    /**
     * Test FULL name of the day of the week in date format is alright.
     *
     * @throws \Exception
     * @return void
     */
    public function testDayNameFull()
    {
        $date = new DateTimeCzech('2018-11-21');

        $this->assertEquals($date->format('l[cz]'), 'středa');
        $this->assertEquals($date->format('j.n.Y l[cz]'), '21.11.2018 středa');

        $this->assertEquals('ve ' . $date->format('l[cz] j.n.Y', 4), 've středu 21.11.2018');
    }
}
