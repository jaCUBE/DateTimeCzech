<?php

/**
 * Dictionary for DateTimeCzech contains strings for translating Czech vars.
 *
 * @package  DateTimeCzech
 * @author   Jakub Rychecký <jakub@rychecky.cz>
 */

namespace DateTimeCzech;

class Formatter
{

    /**
     * @var DateTimeCzech DateTime object
     */
    private $dateTimeCzech;

    /**
     * @var int Flex in Czech (1-7)
     */
    private $flex = 1;

    /**
     * Formatter constructor.
     *
     * @param DateTimeCzech $dateTimeCzech DateTime object
     * @param int $flex Flex in Czech (1-7)
     */
    public function __construct($dateTimeCzech, $flex = 1)
    {
        $this->setDateTimeCzech($dateTimeCzech);
        $this->setFlex($flex);
    }

    /**
     * Replace Czech variables in format string.
     *
     * @param string $format Format string according to date() and DateTime
     *
     * @return string Resulted format with replaced Czech variables
     */
    public function format($format)
    {
        // No Czech date format in format string
        if (strpos($format, '[cz]') === false) {
            return $format;
        }

        // Replace variables in format for actual values
        $format = $this->replaceDayOfWeek($format);
        $format = $this->replaceMonth($format);

        return (string)$format;
    }

    /**
     * Replace Czech day of the week names (full and short) for special variables in format string.
     *
     * @param string $format Format string according to date() and DateTime
     *
     * @return string Format string with replaced Czech day of the week name
     */
    private function replaceDayOfWeek($format)
    {
        // Day of the week: replace full textual representation
        if (strpos($format, 'l[cz]') !== false) {
            $dayName = Dictionary::DAY_NAME[$this->getDateTimeCzech()->format('N')][$this->getFlex()];
            $format = $this->replaceInFormat('l[cz]', $dayName, $format);
        }

        // Day of the week: replace short textual representation
        if (strpos($format, 'D[cz]') !== false) {
            $dayName = Dictionary::DAY_NAME_SHORT[$this->getDateTimeCzech()->format('N')];
            $format = $this->replaceInFormat('D[cz]', $dayName, $format);
        }

        return $format;
    }

    /**
     * Replace Czech month name (full and short) for special variables in format string.
     *
     * @param string $format Format string according to date() and DateTime
     *
     * @return string Format string with replaced Czech month name
     */
    private function replaceMonth($format)
    {
        // Month: replace full textual representation
        if (strpos($format, 'F[cz]') !== false) {
            $monthName = Dictionary::MONTH_NAME[$this->getDateTimeCzech()->format('n')][$this->getFlex()];
            $format = $this->replaceInFormat('F[cz]', $monthName, $format);
        }

        // Month: replace short textual representation
        if (strpos($format, 'M[cz]') !== false) {
            $monthName = Dictionary::MONTH_NAME_SHORT[$this->getDateTimeCzech()->format('n')];
            $format = $this->replaceInFormat('M[cz]', $monthName, $format);
        }

        return $format;
    }

    /**
     * Replace Czech day of the week names (full and short) for special variables in format string.
     *
     * @see http://php.net/manual/en/function.str-replace.php
     *
     * @param string $search
     * @param string $replace
     * @param string $format Original date format string
     *
     * @return string Format string with replaced Czech day of the week name
     */
    private function replaceInFormat($search, $replace, $format)
    {
        return str_replace($search, $this->getEscapedString($replace), $format);
    }

    /**
     * Escape string to be ignored while formatting via DateTime::format
     *
     * @param string $string Unescaped format string
     *
     * @return string Escaped format string
     */
    private function getEscapedString($string)
    {
        $string = (string)$string;

        if ($string === '') {
            return '';
        }

        // Appending \\ before every character to make them escaped
        return '\\' . implode('\\', str_split(trim($string)));
    }

    /**
     * Get DateTimeCzech object.
     *
     * @return DateTimeCzech DateTimeCzech object
     */
    public function getDateTimeCzech()
    {
        return $this->dateTimeCzech;
    }

    /**
     * Set DateTimeCzech object.
     *
     * @param DateTimeCzech $dateTime
     */
    public function setDateTimeCzech($dateTime)
    {
        $this->dateTimeCzech = $dateTime;
    }

    /**
     * Get flex in Czech.
     *
     * @return int
     */
    public function getFlex()
    {
        return $this->flex;
    }

    /**
     * Set Czech language flex.
     *
     * @param int $flex Flex (1-7)
     *
     * @return void
     */
    public function setFlex($flex)
    {
        $flex = (int)$flex;

        // Seven flexes for Czech only
        if ($flex < 1 || $flex > 7) {
            $flex = 1;
        }

        $this->flex = $flex;
    }
}
