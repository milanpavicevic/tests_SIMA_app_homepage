<?php

include_once dirname(dirname(__FILE__)) . '/Homepage_Common.php';

class NotificationsFunctionalityCest
{  
    public function _before(AcceptanceTester $I)
    {
        $I->loginAsAdminUser($I);
    }

    public function _after(AcceptanceTester $I)
    {
    }
    
    public static $_messages = "div.header div.header-options-first-level ";
    public static $_see_all = "//div[@id='sima-notifications']/div[@class='_tabs_wrapper']"
            . "/div[@class='_header']/span[contains(text(),'Vidite sve')]";
    public static $_see_all_options = "//div[@class='sima-guitable-options sima-layout-fixed-panel']";
    public static $_notification_wrapper = "//div[@id='sima-notifications']/div[@class='_tabs_wrapper']";
    public static $_exclamation_triangle = "//div[@id='warnings_vue']"
               . "/div[@class='_icon fas fa-exclamation-triangle _new']";
    public static $_sda = "//div[@title='Izaberite sesiju']";
    public static $_triangle_list = "//div[@id='warnings_vue']/div[@class='_list']";
    
    public function Logo(AcceptanceTester $I)
    {
        $I->wantTo('Logo s: 1');
        $I->waitForElementVisible(Homepage_Common::$_top_bar_profile, Helper\Acceptance::$wait_medium);
        $I->click(Homepage_Common::$_top_bar_profile);
        $I->waitForText('Admin User', Helper\Acceptance::$wait_medium, "//div[@model_view='title']");
        $I->waitForElementVisible(Homepage_Common::$_top_bar_logo, Helper\Acceptance::$wait_medium);
        $I->click(Homepage_Common::$_top_bar_logo."/img");
        $I->waitForText(Homepage_Common::$_beginning_string, Helper\Acceptance::$wait_medium, Homepage_Common::$_tab_homepage);
    }
    
    public function Messages(AcceptanceTester $I)
    {
        $I->wantTo('Messages - s: 2');
        $I->waitForElementVisible(Homepage_Common::$_messages_icon, Helper\Acceptance::$wait_medium);
        $I->click(Homepage_Common::$_messages_icon);
        $I->waitForElementVisible(self::$_messages."span.btn_messages_list",
                Helper\Acceptance::$wait_medium);
        $I->waitForElementVisible(self::$_messages."span.users_list",
                Helper\Acceptance::$wait_medium);
        $I->waitForElementVisible(self::$_messages."span.see_all",
                Helper\Acceptance::$wait_medium);
    }
    
    public function NotificationBell(AcceptanceTester $I)
    {
        $I->wantTo('NotificationBell - s: 3');
        $I->waitForElementVisible(Homepage_Common::$_notification_bell, Helper\Acceptance::$wait_medium);
        $I->click(Homepage_Common::$_notification_bell);
        $I->waitForElementVisible(self::$_notification_wrapper."/div[@class='_header']"
                . "/span[contains(text(),'".MainMenu_help::$_notifications_string."')]",
                Helper\Acceptance::$wait_medium);
        $I->waitForElementVisible("//li[@id='t-Sva obaveštenja']/a"
                . "/span[contains(text(),'Sva obaveštenja')]", Helper\Acceptance::$wait_medium);
        $I->waitForElementVisible("//div[@class='nav-tabs-wrapper']/ul", Helper\Acceptance::$wait_medium);
        $I->waitForElementVisible(self::$_see_all, Helper\Acceptance::$wait_medium);
        $I->click(self::$_see_all);
        $I->click(Homepage_Common::$_notification_bell);
        $I->waitForElementNotVisible(self::$_notification_wrapper, Helper\Acceptance::$wait_medium);
        $I->waitForElementVisible("//li[@title='".MainMenu_help::$_notifications_string."']"
                . "/a[@title='".MainMenu_help::$_notifications_string."']", Helper\Acceptance::$wait_medium);
    }
    
    public function SDA(AcceptanceTester $I)
    {
        $I->wantTo('SDA - s: 4');
        $I->waitForElementVisible(self::$_sda, Helper\Acceptance::$wait_medium);
        $I->click(self::$_sda);
        $I->waitForElementVisible("//div[@title='Za instalaciju i nacin upotrebe pogledajte uputstvo']"
                . "/span[contains(text(),'Skini SDA - SIMA Desktop Aplikacija')]", Helper\Acceptance::$wait_medium);
    }
    
    public function ExclamationTriangle(AcceptanceTester $I)
    {
       $I->wantTo('ExclamationTriangle - s: 5');
       $I->waitForElementVisible(self::$_exclamation_triangle, Helper\Acceptance::$wait_medium);
       $I->click(self::$_exclamation_triangle);
       $I->waitForElementVisible(self::$_triangle_list."/ul", Helper\Acceptance::$wait_medium);
       $I->waitForElementVisible(self::$_triangle_list."/div[@class='_see_all']"
               . "/span[@class='_title'][contains(text(),'Upozorenja')]", Helper\Acceptance::$wait_medium);
    }
}