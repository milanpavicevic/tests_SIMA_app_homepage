<?php

class Calendar_help
{
    public static $_carnets = 'Moji karneti';

        public static function DayInWeek ($I, $day, $dayNumber)
    {
        $I->waitForText($day, Helper\Acceptance::$wait_medium,
                "//ul[@class='simaCalendarEvents-daysList showAsWeek showDayNames']/li[".$dayNumber."]");
    }
}
