<?php

/**
 * Public holiday checker and manager.
 *
 * @package  DateTimeCzech
 * @author   Jakub Rychecký <jakub@rychecky.cz>
 */

namespace DateTimeCzech;

class PublicHoliday
{

    /**
     * Day of the year since Easter Friday is public holiday
     */
    const YEAR_EASTER_FRIDAY = 2016;

    /**
     * @var \DateTimeInterface DateTimeCzech object
     */
    private $dateTime;

    /**
     * PublicHoliday constructor.
     *
     * @param \DateTimeInterface $dateTime DateTimeCzech object
     */
    public function __construct(\DateTimeInterface $dateTime)
    {
        $this->setDateTime($dateTime);
    }

    /**
     * Get holiday name if date is public holiday in Czech Republic.
     *
     * @throws \Exception
     * @return string Name of the public holiday (empty string = no holiday for such date)
     */
    public function getPublicHolidayName()
    {
        $date = $this->getDateTime()->format('Y-m-d');
        $holidayList = $this->getPublicHolidayListForYear();

        return !empty($holidayList[$date]) ? $holidayList[$date] : '';
    }

    /**
     * Generate date list of public holidays in chosen year.
     *
     * @param string|int $year Optional year, otherwise taken from used DateTimeCzech object
     *
     * @throws \Exception
     * @return array The list of Czech public holiday of the year (Y-m-d => holiday name)
     */
    public function getPublicHolidayListForYear($year = '')
    {
        $holidayList = [];
        $year = $this->prepareYear($year);

        // General static public holidays date list for this year
        foreach (Dictionary::PUBLIC_HOLIDAY as $date => $name) {
            $dateFull = $year . '-' . $date;
            $holidayList[$dateFull] = $name;
        }

        // TODO: 32-bit PHP should check only when year is 1970-2037 http://php.net/manual/en/function.easter-date.php
        // TODO: Or even better: redone to easter_days()? http://php.net/manual/en/function.easter-days.php

        // Easter Monday
        $easterMonday = new \DateTime();
        $easterMonday->setTimestamp(easter_date($year)); // Easter Sunday
        $easterMonday->add(new \DateInterval('P1D')); // +1 day
        $holidayList[$easterMonday->format('Y-m-d')] = Dictionary::PUBLIC_HOLIDAY_OTHERS['easterMonday'];

        // Easter Friday since 2016
        if ($year >= self::YEAR_EASTER_FRIDAY) {
            $easterFriday = $easterMonday->sub(new \DateInterval('P3D')); // Monday -3 days
            $holidayList[$easterFriday->format('Y-m-d')] = Dictionary::PUBLIC_HOLIDAY_OTHERS['easterFriday'];
        }

        return $holidayList; // TODO: Rework into a collection with methods
    }

    /**
     * Prepare year for Czech public holiday list.
     *
     * @param string|int $year Chosen year (or empty for year of the setted date)
     *
     * @return int Result year
     */
    private function prepareYear($year = '')
    {
        $year = (int)$year;

        if (!empty($year)) {
            return $year;
        }

        return (int)$this->getDateTime()->format('Y');
    }

    /**
     * Get DateTimeCzech object.
     *
     * @return DateTimeCzech DateTimeCzech object
     */
    public function getDateTime()
    {
        return $this->dateTime;
    }

    /**
     * Set DateTimeCzech object.
     *
     * @param DateTimeCzech DateTimeCzech object
     *
     * @return void
     */
    public function setDateTime($dateTime)
    {
        $this->dateTime = $dateTime;
    }
}
