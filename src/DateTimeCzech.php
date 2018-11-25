<?php

/**
 * Extended DateTime native class with support for Czech dates and public holidays.
 *
 * @package  DateTimeCzech
 * @author   Jakub Rychecký <jakub@rychecky.cz>
 * @see      http://php.net/manual/en/class.datetime.php
 */

namespace DateTimeCzech;

class DateTimeCzech extends \DateTime
{
    /**
     * Format date extended with Czech variables in string
     *
     * @param string $format Default datetime() and Date::format format string with Czech variables
     * @param int $flex Czech flexes (1–7), default
     *
     * @return string Formatted string
     */
    public function format($format, $flex = 1)
    {
        $formatter = new Formatter($this, $flex);
        $format = $formatter->format($format); // Replace Czech variables

        return parent::format($format); // Replace with default DateTime::format
    }

    /**
     * Is date a weekend?
     *
     * @return bool Is a weekend?
     */
    public function isWeekend()
    {
        return (int)$this->format('N') >= 6;
    }

    /**
     * Get holiday name if date is public holiday in Czech Republic.
     *
     * @throws \Exception
     * @return string Name of the public holiday (empty string = no holiday for such date)
     */
    public function getPublicHolidayName()
    {
        $publicHoliday = new PublicHoliday($this);

        return (string)$publicHoliday->getPublicHolidayName();
    }

    /**
     * Check if date is public holiday in Czech Republic.
     *
     * @throws \Exception
     * @return bool Is date a public holiday?
     */
    public function isPublicHoliday()
    {
        return !empty($this->getPublicHolidayName());
    }

    /**
     * Is date a working day in Czech Republic?
     *
     * @throws \Exception
     * @return bool Is working day?
     */
    public function isWorkingDay()
    {
        return !$this->isWeekend() && !$this->isPublicHoliday();
    }
}
