<?php

namespace NotTomorrow\Handlers;


interface AnnualHolidays
{
    /**
     * Should return an array of dates as string in the Y-m-d format:
     * Example: ['2017-05-07','2018-01-07']
     *
     * @param int $year
     * @return array
     */
    public function getAll(int $year): array;
}