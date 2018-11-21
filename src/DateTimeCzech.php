<?php

/**
 *
 */

namespace DateTimeCzech;

use DateTimeCzech\Dictionary\Month as MonthDictionary;
use DateTimeCzech\Dictionary\Day as DayDictionary;

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
        // No Czech date format
        if (strpos($format, '[cz]') === false) {
            return parent::format($format);
        }

        // Day of the week: replace full textual representation
        if (strpos($format, 'l[cz]') !== false) {
            $dayName = DayDictionary::DICTIONARY_DAY_NAME[$this->format('N')][$flex];
            $format = $this->replaceInFormat('l[cz]', $dayName, $format);
        }

        // Day of the week: replace short textual representation
        if (strpos($format, 'D[cz]') !== false) {
            $dayName = DayDictionary::DICTIONARY_DAY_NAME_SHORT[$this->format('N')];
            $format = $this->replaceInFormat('D[cz]', $dayName, $format);
        }

        // Month: replace full textual representation
        if (strpos($format, 'F[cz]') !== false) {
            $monthName = MonthDictionary::DICTIONARY_MONTH_NAME[$this->format('n')][$flex];
            $format = $this->replaceInFormat('F[cz]', $monthName, $format);
        }

        // Month: replace short textual representation
        if (strpos($format, 'M[cz]') !== false) {
            $monthName = MonthDictionary::DICTIONARY_MONTH_NAME_SHORT[$this->format('n')];
            $format = $this->replaceInFormat('M[cz]', $monthName, $format);
        }

        return parent::format($format);
    }

    /**
     * @param $search
     * @param $replace
     * @param $format
     *
     * @return mixed
     */
    private function replaceInFormat($search, $replace, $format) {
        return str_replace($search, $this->getEscapedString($replace), $format);
    }

    /**
     * @param $string
     *
     * @return string
     */
    private function getEscapedString($string)
    {
        $string = (string)$string;

        if ($string === '') {
            return '';
        }

        return '\\' . implode('\\', str_split(trim($string)));
    }

}
