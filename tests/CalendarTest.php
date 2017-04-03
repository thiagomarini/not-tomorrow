<?php

use NotTomorrow\Calendar;
use NotTomorrow\Handlers\EnglandWhalesHolidays;
use PHPUnit\Framework\TestCase;

final class CalendarTest extends TestCase
{
    /**
     * @var Calendar
     */
    private $calendar;

    public function setUp()
    {
        parent::setUp();

        $this->calendar = new Calendar(new EnglandWhalesHolidays());
    }

    /**
     * Checks if next day is on weekend
     * @test
     **/
    public function check_if_next_day_is_on_weekend()
    {
        $this->assertTrue($this->calendar->isNextDayOnWeekend(new \DateTime('2017-04-01')));
    }

    /**
     * Checks if next day is not on weekend
     * @test
     **/
    public function check_if_next_day_is_not_on_weekend()
    {
        $this->assertFalse($this->calendar->isNextDayOnWeekend(new \DateTime('2017-04-03')));
    }

    /**
     * Checks if day is holiday in England & Whales
     * @test
     **/
    public function check_if_given_date_is_holiday()
    {
        $this->assertTrue($this->calendar->isHoliday(new \DateTime('2017-12-25')));
    }

    /**
     * Checks if day is NOT holiday in England & Whales
     * @test
     **/
    public function check_if_given_date_is_not_holiday()
    {
        $this->assertFalse($this->calendar->isHoliday(new \DateTime('2017-12-12')));
    }

    /**
     * Finds the next working day after Friday in England & Whales
     * @test
     **/
    public function calculate_next_working_day_from_friday()
    {
        $friday = new \DateTime('2017-03-31');
        $this->assertEquals(new \DateTime('2017-04-03'), $this->calendar->findNextWorkingDay($friday));
    }

    /**
     * Finds the next working day after Saturday in England & Whales
     * @test
     **/
    public function calculate_next_working_day_from_saturday()
    {
        $saturday = new \DateTime('2017-04-01');
        $this->assertEquals(new \DateTime('2017-04-03'), $this->calendar->findNextWorkingDay($saturday));
    }

    /**
     * Finds the next working day after Sunday in England & Whales
     * @test
     **/
    public function calculate_next_working_day_from_sunday()
    {
        $sunday = new \DateTime('2017-04-02');
        $this->assertEquals(new \DateTime('2017-04-03'), $this->calendar->findNextWorkingDay($sunday));
    }

    /**
     * Finds the next working day after a Friday holiday in England & Whales
     * @test
     **/
    public function calculate_next_working_day_for_friday_holiday()
    {
        $beforeFridayHoliday = new \DateTime('2017-04-13');
        $this->assertEquals(new \DateTime('2017-04-18'), $this->calendar->findNextWorkingDay($beforeFridayHoliday));
    }

    /**
     * Finds the next working day after a Monday holiday in England & Whales
     * @test
     **/
    public function calculate_next_working_day_for_monday_holiday()
    {
        $beforeMondayHoliday = new \DateTime('2017-04-28');
        $this->assertEquals(new \DateTime('2017-05-02'), $this->calendar->findNextWorkingDay($beforeMondayHoliday));
    }
}
