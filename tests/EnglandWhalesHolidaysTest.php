<?php

use NotTomorrow\Handlers\EnglandWhalesHolidays;
use PHPUnit\Framework\TestCase;

final class EnglandWhalesHolidaysTest extends TestCase
{
    /**
     * @var EnglandWhalesHolidays
     */
    private $handler;

    public function setUp()
    {
        parent::setUp();

        $this->handler = new EnglandWhalesHolidays();
    }

    /**
     * Test 2017 bank holiday dates in England & Whales
     * @test
     **/
    public function dates_are_holiday()
    {
        $days = $this->handler->getAll(2017);
        $this->assertCount(8, $days);

        $this->assertTrue(in_array('2017-01-02', $days));
        $this->assertTrue(in_array('2017-04-14', $days));
        $this->assertTrue(in_array('2017-04-17', $days));
        $this->assertTrue(in_array('2017-05-01', $days));
        $this->assertTrue(in_array('2017-08-28', $days));
        $this->assertTrue(in_array('2017-12-25', $days));
        $this->assertTrue(in_array('2017-12-26', $days));
    }
}