<?php

/**
 *
 */

namespace DateTimeCzech;


class PublicHoliday {

    const YEAR_EASTER_FRIDAY = 2016;

    /**
     * @var DateTimeCzech
     */
    private $dateTimeCzech;



    public function __construct($dateTimeCzech)
    {
        $this->setDateTimeCzech($dateTimeCzech);
    }

    /**
     * Check if date is public holiday in Czech Republic.
     * @throws \Exception
     * @return bool|string Returns name of the public holiday or false if date is not public holiday
     */
    public function isPublicHoliday() {
        $date = $this->getDateTimeCzech()->format('Y-m-d');
        $holidayList = $this->getPublicHolidayListForYear();

        return !empty($holidayList[$date]) ? $holidayList[$date] : false;
    }

    /**
     * Generate date list of public holidays in chosen year.
     * @param string|int $year Optional year, otherwise taken from used DateTimeCzech object
     * @throws \Exception
     * @return array The list of Czech public holiday of the year (Y-m-d => holiday name)
     */
    public function getPublicHolidayListForYear($year = '') {
        $holidayList = [];
        $year = $this->prepareYear($year);

        // Generic public holidays date list for this year
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
     * @param $year
     *
     * @return int
     */
    private function prepareYear($year) {
        $year = (int)$year;

        if (!empty($year)) {
            return $year;
        }

        return (int)$this->getDateTimeCzech()->format('Y');
    }



    /**
     * @return mixed
     */
    public function getDateTimeCzech()
    {
        return $this->dateTimeCzech;
    }

    /**
     * @param mixed $dateTime
     */
    public function setDateTimeCzech($dateTime)
    {
        $this->dateTimeCzech = $dateTime;
    }
}
