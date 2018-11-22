<?php

use PHPUnit\Framework\TestCase;
use DateTimeCzech\DateTimeCzech;
use DateTimeCzech\Dictionary;

/**
 * Basic tests with issues related to Czech public holiday detection
 */

class PublicHolidayTest extends TestCase {

    /**
     * Test FULL name of the month in date format is alright.
     *
     * @return void
     * @throws \Exception
     */
    public function testGenericPublicHoliday() {
        $date = new DateTimeCzech('2018-11-17');
        $this->assertNotFalse($date->isPublicHoliday());

        // Proper holiday name in history
        $date = new DateTimeCzech('1970-07-06');
        $this->assertEquals($date->isPublicHoliday(), Dictionary::PUBLIC_HOLIDAY['07-06']);
    }
}
