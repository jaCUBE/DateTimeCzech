<?php

/**
 * Test public holiday detection.
 *
 * @package  DateTimeCzech
 * @author   Jakub Rychecký <jakub@rychecky.cz>
 */

use PHPUnit\Framework\TestCase;
use DateTimeCzech\DateTimeCzech;
use DateTimeCzech\Dictionary;

class PublicHolidayTest extends TestCase
{

    /**
     * Test FULL name of the month in date format is alright.
     *
     * @return void
     * @throws \Exception
     */
    public function testGenericPublicHoliday()
    {
        // November 16: no public holiday
        $date = new DateTimeCzech('2018-11-16');
        $this->assertFalse($date->isPublicHoliday());

        // November 17: public holiday
        $date->add(new DateInterval('P1D'));
        $this->assertTrue($date->isPublicHoliday());

        // November 18: no public holiday
        $date->add(new DateInterval('P1D'));
        $this->assertFalse($date->isPublicHoliday());
    }
}
