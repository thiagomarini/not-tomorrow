<?php

namespace NotTommorow\Handlers;


interface AnnualHolidays
{
    public function getAll(int $year): array;
}