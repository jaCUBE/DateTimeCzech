<?php

use PHPUnit\Framework\TestCase;
use DateTimeCzech\DateTimeCzech;

/**
 * Basic tests with issues related to month processing.
 */

class DayTest extends TestCase {



    /**
     *
     */
    public function testDayNameFull() {
        $date = new DateTimeCzech('2018-11-21');

        $this->assertEquals($date->format('l[cz]'), 'středa');
        $this->assertEquals($date->format('j.n.Y l[cz]'), '21.11.2018 středa');

        $this->assertEquals('ve ' . $date->format('l[cz] j.n.Y', 4), 've středu 21.11.2018');
    }

    /**
     *
     */
    public function testDayNameShort() {
        $date = new DateTimeCzech('2040-01-01');

        $this->assertEquals($date->format('D[cz]'), 'ne');
        $this->assertEquals($date->format('j.n.Y D[cz]'), '1.1.2040 ne');

        // Flexes have no affect on short form
        $this->assertEquals($date->format('D[cz]', 4), 'ne');
    }
}
