# not-tomorrow

[![CircleCI](https://circleci.com/gh/thiagomarini/not-tomorrow.svg?style=svg)](https://circleci.com/gh/thiagomarini/not-tomorrow)

#### What for?
PHP library to calculate the next working day. Handy if you work with delivery only on weekdays.

You can also check if a given date is a holiday or if the next day is on weekend.

Depends on [easter_days()](http://php.net/manual/en/function.easter-days.php)

#### Relies on handlers to work

Right now it can only calculate workdays for: 

* England and Whales

Feel free to contribute and send more handlers via pull requests. Handlers need to implement `AnnualHolidays` interface.

#### Usage

Create a calendar class with a handler: `$calendar = new Calendar(new EnglandWhalesHolidays());`

Check if next day of a given date is on weekend: `$calendar->isNextDayOnWeekend(new \DateTime('2017-04-01'))`

Check if a given date is a holiday: `$calendar->isHoliday(new \DateTime('2017-12-25'))`

Find the next working day: `$calendar->findNextWorkingDay($friday)`

#### License
MIT
