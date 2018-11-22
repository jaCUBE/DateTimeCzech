<?php

use PHPUnit\Framework\TestCase;
use DateTimeCzech\DateTimeCzech;

/**
 * Basic tests with issues related to month processing.
 */

class MonthTest extends TestCase {

    /**
     * Test FULL name of the month in date format is alright.
     *
     * @return void
     * @throws \Exception
     */
    public function testMonthNameFull() {
        $date = new DateTimeCzech('2018-11-22');

        $this->assertEquals($date->format('F[cz]'), 'listopad');
        $this->assertEquals($date->format('F[cz]', 2), 'listopadu');

        $this->assertEquals($date->format('j. F[cz] Y', 2), '22. listopadu 2018');
    }

    /**
     * Test SHORT name of the month in date format is alright.
     *
     * @return void
     * @throws \Exception
     */
    public function testDayNameShort() {
        $date = new DateTimeCzech('2018-11-22');

        $this->assertEquals($date->format('M[cz]'), 'lis');

        // +1 month, let's try original \DateTime method
        $date->add(new DateInterval('P1M'));
        $this->assertEquals($date->format('M[cz]'), 'pro');
    }
}
