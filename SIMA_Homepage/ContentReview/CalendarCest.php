<?php

include_once 'Calendar_help.php';

class CalendarCest 
{
    public function _before(AcceptanceTester $I)
    {
        $I->loginAsAdminUser($I);
    }

    public function _after(AcceptanceTester $I)
    {
    }
    
    public static $_day_in_week = "//ul[@class='simaCalendarEvents-daysList showAsWeek showDayNames']/li";
    public static $_calendar_current_title = "//div[@class='simaCalendarEvents-currentTitle']";
    public static $_calendar_slider = "//div[@class='simaCalendarEvents-slider']";
    public static $_carnets_panel = "//div[@class='sima-layout-fixed-panel start-page-center-panel-header']"
            . "/div[@title='Moji karneti']/span";
    public static $_arrow_prev = "/a[@class='arrow prev']/span";
    public static $_arrow_next = "/a[@class='arrow next']/span";
    public static $_legend_button = "//div[@class='simaCalendarEvents-legendButton']";

    public function MonthTitle(AcceptanceTester $I)
    {
        $I->wantTo('MonthTitle - s: 1');
        $I->waitForElementVisible("//div[@class='sima-ui-event-calendar simaCalendarEvents-wrap']", 
                Helper\Acceptance::$wait_medium);
        $I->waitForElementVisible(self::$_calendar_current_title, Helper\Acceptance::$wait_medium);
        $I->waitForElementVisible(self::$_calendar_current_title
                . "/div[@class='monthTitle']", Helper\Acceptance::$wait_medium);
        $I->waitForElementVisible(self::$_calendar_slider.self::$_arrow_prev, 
                Helper\Acceptance::$wait_medium);
        $I->waitForElementVisible(self::$_calendar_slider.self::$_arrow_next,
                Helper\Acceptance::$wait_medium);
        $I->waitForElementVisible(self::$_calendar_current_title
                 . "/div[@class='monthTitle']/span[@class='calendar-refresh']", 
                Helper\Acceptance::$wait_medium);
    }
    
    public function CalendarEvents(AcceptanceTester $I)
    {
        $I->wantTo('CalendarEvents - s: 2');
        Calendar_help::DayInWeek($I, 'pon', '1');
        Calendar_help::DayInWeek($I, 'uto', '2');
        Calendar_help::DayInWeek($I, 'sre', '3');
        Calendar_help::DayInWeek($I, 'čet', '4');
        Calendar_help::DayInWeek($I, 'pet', '5');
        Calendar_help::DayInWeek($I, 'sub', '6');
        Calendar_help::DayInWeek($I, 'ned', '7');
    }
    
    public function LegendIcon(AcceptanceTester $I)
    {
        $I->wantTo('LegendIcon - s: 3');
        $I->waitForElementVisible(self::$_legend_button, Helper\Acceptance::$wait_medium);
        $I->waitForText('Legenda ikonica', Helper\Acceptance::$wait_medium, 
                self::$_legend_button);
    }
    
    public function CarnetsOnCentralPanel(AcceptanceTester $I)
    {
        $I->wantTo('CarnetsOnCentralPanel - s: 4');
        $I->waitForElementVisible(self::$_carnets_panel."[contains(text(),'".Calendar_help::$_carnets."')]", 
                Helper\Acceptance::$wait_medium);
        $I->waitForText(Calendar_help::$_carnets,  Helper\Acceptance::$wait_medium, self::$_carnets_panel);
    }
}