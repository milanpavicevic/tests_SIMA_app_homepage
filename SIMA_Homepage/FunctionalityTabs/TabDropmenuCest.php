<?php

include_once dirname(dirname(__FILE__)) . '/Homepage_Common.php';
include_once 'Tabs_help.php';

class TabDropmenuCest
{
    public function DropdownContent(AcceptanceTester $I)
    {
        $I->wantTo('DropdownContent - s: 13');
        $I->loginAsAdminUser($I);
        Homepage_Common::CallEmailOverviewCheck($I);
        $I->waitForElementVisible(Homepage_Common::$_tab_drop_menue, Helper\Acceptance::$wait_medium);
        $I->click(Homepage_Common::$_tab_drop_menue);
        $I->waitForText(Homepage_Common::$_beginning_string, Helper\Acceptance::$wait_medium,
                Homepage_Common::$_tab_drop_menue_content);
        $I->waitForText('Email', Helper\Acceptance::$wait_medium, Homepage_Common::$_dropmenue_item2);
    }

    public function DropdownGetEmpty(AcceptanceTester $I)
    {
        $I->wantTo('DropdownGetEmpty - s: 14');
        $I->loginAsUserEmployee($I);
        Homepage_Common::EmployeeCallEmailOverviewCheck($I);
        $I->waitForElementVisible(Homepage_Common::$_tab_drop_menue, Helper\Acceptance::$wait_medium);
        $I->click(Homepage_Common::$_tab_drop_menue);
        $I->waitForText(Homepage_Common::$_beginning_string, Helper\Acceptance::$wait_medium, 
                Homepage_Common::$_tab_drop_menue_content);
        $I->waitForText('Email', Helper\Acceptance::$wait_medium, Homepage_Common::$_dropmenue_item2);
        $I->waitForElementVisible(Homepage_Common::$_tab_line.Tabs_help::$_email_tab_title
                .Homepage_Common::$_close_icon, Helper\Acceptance::$wait_medium);
        $I->click(Homepage_Common::$_tab_line.Tabs_help::$_email_tab_title.Homepage_Common::$_close_icon);
        $I->waitForElementNotVisible(Homepage_Common::$_tab_line.Tabs_help::$_email_tab_title,
                Helper\Acceptance::$wait_medium);
        $I->waitForElementVisible(Homepage_Common::$_tab_drop_menue, Helper\Acceptance::$wait_medium);
        $I->click(Homepage_Common::$_tab_drop_menue);
        $I->waitForText(Homepage_Common::$_beginning_string, Helper\Acceptance::$wait_medium, 
                Homepage_Common::$_tab_drop_menue_content);
        $I->waitForElementNotVisible(Homepage_Common::$_dropmenue_item2, Helper\Acceptance::$wait_medium);
    }

    public function DropdownLinks(AcceptanceTester $I) 
    {
        $I->wantTo('DropdownLinks - s: 15');
        $I->loginAsUserEmployee($I);
        Homepage_Common::EmployeeCallEmailOverviewCheck($I);
        $I->waitForElementVisible(Homepage_Common::$_tab_drop_menue, Helper\Acceptance::$wait_medium);
        $I->click(Homepage_Common::$_tab_drop_menue);
        $I->waitForText(Homepage_Common::$_beginning_string, Helper\Acceptance::$wait_medium, 
                Homepage_Common::$_tab_drop_menue_content);
        $I->click(Homepage_Common::$_tab_drop_menue_content."/li/a[contains(text(),'"
                .Homepage_Common::$_beginning_string."')]");
        $I->waitForElementVisible("//div[@class='sima-ui-event-calendar simaCalendarEvents-wrap']",
                Helper\Acceptance::$wait_medium);
        $I->waitForElementVisible(Homepage_Common::$_tab_drop_menue, Helper\Acceptance::$wait_medium);
        $I->click(Homepage_Common::$_tab_drop_menue);
        $I->waitForText('Email', Helper\Acceptance::$wait_medium, Homepage_Common::$_dropmenue_item2);
        $I->click(Homepage_Common::$_dropmenue_item2);
        $I->waitForElementVisible(Homepage_Common::$_tab_email, Helper\Acceptance::$wait_medium);
        $I->waitForText('Mail', Helper\Acceptance::$wait_medium, 
                "//div[contains(concat(' ' ,@class, ' '), 'sima-email-client')]"
                . "/div[contains(concat(' ' ,@class, ' '), 'sima-page-title')]/div");
    }
}