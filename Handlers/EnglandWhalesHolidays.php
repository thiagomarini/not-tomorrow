<?php

namespace NotTomorrow\Handlers;


class EnglandWhalesHolidays implements AnnualHolidays
{
    /**
     * Function to calculate which days are British bank holidays (England & Wales) for a given year.
     * @see http://php.net/manual/en/ref.calendar.php#77159
     *
     * @param int $year
     * @return array
     */
    public function getAll(int $year): array
    {
        $bankHols = [];

        // New year's:
        switch (date("w", strtotime("$year-01-01 12:00:00"))) {
            case 6:
                $bankHols[] = "$year-01-03";
                break;
            case 0:
                $bankHols[] = "$year-01-02";
                break;
            default:
                $bankHols[] = "$year-01-01";
        }
        
        $bankHols[] = date("Y-m-d", strtotime("+" . (easter_days($year) - 2) . " days", strtotime("$year-03-21 12:00:00")));
        // Easter Monday:
        $bankHols[] = date("Y-m-d", strtotime("+" . (easter_days($year) + 1) . " days", strtotime("$year-03-21 12:00:00")));

        // May Day:
        if ($year == 1995) {
            $bankHols[] = "1995-05-08"; // VE day 50th anniversary year exception
        } else {
            switch (date("w", strtotime("$year-05-01 12:00:00"))) {
                case 0:
                    $bankHols[] = "$year-05-02";
                    break;
                case 1:
                    $bankHols[] = "$year-05-01";
                    break;
                case 2:
                    $bankHols[] = "$year-05-07";
                    break;
                case 3:
                    $bankHols[] = "$year-05-06";
                    break;
                case 4:
                    $bankHols[] = "$year-05-05";
                    break;
                case 5:
                    $bankHols[] = "$year-05-04";
                    break;
                case 6:
                    $bankHols[] = "$year-05-03";
                    break;
            }
        }

        // Whitsun:
        if ($year == 2002) { // exception year
            $bankHols[] = "2002-06-03";
            $bankHols[] = "2002-06-04";
        } else {
            switch (date("w", strtotime("$year-05-31 12:00:00"))) {
                case 0:
                    $bankHols[] = "$year-05-25";
                    break;
                case 1:
                    $bankHols[] = "$year-05-31";
                    break;
                case 2:
                    $bankHols[] = "$year-05-30";
                    break;
                case 3:
                    $bankHols[] = "$year-05-29";
                    break;
                case 4:
                    $bankHols[] = "$year-05-28";
                    break;
                case 5:
                    $bankHols[] = "$year-05-27";
                    break;
                case 6:
                    $bankHols[] = "$year-05-26";
                    break;
            }
        }

        // Summer Bank Holiday:
        switch (date("w", strtotime("$year-08-31 12:00:00"))) {
            case 0:
                $bankHols[] = "$year-08-25";
                break;
            case 1:
                $bankHols[] = "$year-08-31";
                break;
            case 2:
                $bankHols[] = "$year-08-30";
                break;
            case 3:
                $bankHols[] = "$year-08-29";
                break;
            case 4:
                $bankHols[] = "$year-08-28";
                break;
            case 5:
                $bankHols[] = "$year-08-27";
                break;
            case 6:
                $bankHols[] = "$year-08-26";
                break;
        }

        // Christmas:
        switch (date("w", strtotime("$year-12-25 12:00:00"))) {
            case 5:
                $bankHols[] = "$year-12-25";
                $bankHols[] = "$year-12-28";
                break;
            case 6:
                $bankHols[] = "$year-12-27";
                $bankHols[] = "$year-12-28";
                break;
            case 0:
                $bankHols[] = "$year-12-26";
                $bankHols[] = "$year-12-27";
                break;
            default:
                $bankHols[] = "$year-12-25";
                $bankHols[] = "$year-12-26";
        }

        // Millenium eve
        if ($year == 1999) {
            $bankHols[] = "1999-12-31";
        }

        return $bankHols;
    }
}