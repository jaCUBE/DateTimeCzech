<?php

/**
 *
 */

namespace DateTimeCzech;


class Formatter {
    /**
     * @var DateTimeCzech
     */
    private $dateTimeCzech;

    /**
     * @var int Pád
     */
    private $flex = 1;


    public function __construct($dateTimeCzech, $flex = 1)
    {
        $this->setDateTimeCzech($dateTimeCzech);
        $this->setFlex($flex);
    }

    /**
     * @return int
     */
    public function getFlex()
    {
        return $this->flex;
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

    /**
     * @param int $flex
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


    public function format($format)
    {
        // No Czech date format
        if (strpos($format, '[cz]') === false) {
            return $format;
        }

        $format = $this->replaceDayOfWeek($format);
        $format = $this->replaceMonth($format);

        return $format;
    }

    /**
     * @param $format
     *
     * @return mixed
     */
    private function replaceDayOfWeek($format) {
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
     * @param $format
     * @return string
     */
    private function replaceMonth($format) {
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