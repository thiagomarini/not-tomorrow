<?php

namespace NotTomorrow\Handlers;


interface AnnualHolidays
{
    public function getAll(int $year): array;
}