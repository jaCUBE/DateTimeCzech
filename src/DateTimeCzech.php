<?php

/**
 *
 */

namespace DateTimeCzech;

class DateTimeCzech extends \DateTime
{
    /**
     *
     */
    public function __construct($time = 'now', \DateTimeZone $timezone = null)
    {
        parent::__construct($time, $timezone);
    }

    /**
     * @param string $format
     * @param int $flex Czech flexes (1–7), default
     *
     * @return string
     */
    public function format($format, $flex = 1)
    {
        $formatter = new Formatter($this, $flex);
        $format = $formatter->format($format);

        return parent::format($format);
    }

    /**
     * @return bool
     */
    public function isWeekend() {
        return (int)$this->format('N') >= 6;
    }

    /**
     *
     * @return bool
     */
    public function isPublicHoliday() {
        return false; // TODO: public holidays
    }

    /**
     *
     * @return bool
     */
    public function isWorkingDay() {
        return !$this->isWeekend() && !$this->isPublicHoliday();
    }

}
