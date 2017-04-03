<?php

namespace NotTomorrow;


use NotTomorrow\Handlers\AnnualHolidays;

/**
 * Class Calendar
 *
 * @package NotTomorrow
 */
class Calendar
{
    /**
     * @var AnnualHolidays
     */
    private $annualHolidays;

    /**
     * @param AnnualHolidays $annualHolidays
     */
    public function __construct(AnnualHolidays $annualHolidays)
    {
        $this->annualHolidays = $annualHolidays;
    }

    /**
     * Checks if a given date is a holiday
     *
     * @param \DateTime $date
     * @return bool
     */
    public function isHoliday(\DateTime $date): bool
    {
        return in_array($date->format('Y-m-d'), $this->annualHolidays->getAll($date->format('Y')));
    }

    /**
     * Finds the next working day for England and Whales
     *
     * @param \DateTime $date
     * @return \DateTime
     */
    public function findNextWorkingDay(\DateTime $date): \DateTime
    {
        if ($this->isNextDayOnWeekend($date)) {
            $date->modify('next Monday');
        } else {
            $date->modify('+1 day');
        }

        // recurse with the next day if holiday
        if ($this->isHoliday($date)) {
            return $this->findNextWorkingDay($date);
        }

        return $date;
    }

    /**
     * Checks if a given date is on the weekend
     *
     * @param \DateTime $date
     * @return bool
     */
    public function isNextDayOnWeekend(\DateTime $date): bool
    {
        return preg_match('%(Fri|Sat)%', $date->format('D'));
    }
}