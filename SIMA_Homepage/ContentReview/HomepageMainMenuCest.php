<?php

include_once dirname(dirname(__FILE__)) . '/Homepage_Common.php';

class HomepageMainMenuCest 
{

    public function _before(AcceptanceTester $I)
    {
        $I->loginAsAdminUser($I);
    }

    public function _after(AcceptanceTester $I)
    {
    }
    
    public static $_top_bar = "//div[@id='top_bar']";
    public static $_top_bar_addressbook = "//div[@id='top_bar']/div[@data-code='addressbook']";
    public static $_top_bar_admin = "//div[@id='top_bar']/div[@data-code='admin']";
    public static $_top_bar_evidention = "//div[@id='top_bar']/div[@data-code='legal_records']";
    public static $_top_bar_accounting = "//div[@id='top_bar']/div[@class='mm right'][@data-code='accounting']";
    public static $_top_bar_accounting2 = "//div[@id='top_bar']/div[@data-code='accounting2']";
    public static $_top_bar_profile = "//div[@id='top_bar']/div[@data-code='profile']";
    public static $_top_bar_icon = "//div[@class='mm mm-wiki right'][contains(concat(' ' ,@onclick, ' '), ";
    public static $_top_bar_img_dokumentacija = "//div[@class='mm mm-wiki right']";
    public static $_warnings_vue = "//div[@id='top_bar']/div[@id='warnings_vue']";
    public static $_company_logo = "//div[@class='company-logo']";
    public static $_request_right = "//div[@class='mm mm-baf-request right']";
    public static $_log_out = "//div[@class='mm mm-exit right']";


    public function TopBarLogo(AcceptanceTester $I)
    {
        $I->wantTo('TopBarLogo - s: 5');
        $I->waitForElementVisible(Homepage_Common::$_top_bar_logo, 
                Helper\Acceptance::$wait_medium);
        $I->waitForElementVisible(Homepage_Common::$_top_bar_logo."/img", 
                Helper\Acceptance::$wait_medium);
    }
    
    public function TopBarNotifications(AcceptanceTester $I)
    {
        $I->wantTo('TopBarNotifications - s: 6');
        $I->waitForElementVisible("//div[@class='notifs left']", 
                Helper\Acceptance::$wait_medium);
        $I->waitForElementVisible(Homepage_Common::$_messages_icon, Helper\Acceptance::$wait_medium);
        $I->waitForElementVisible(Homepage_Common::$_notification_bell, 
                Helper\Acceptance::$wait_medium);
        $I->waitForElementVisible(self::$_warnings_vue, Helper\Acceptance::$wait_medium);
        $I->waitForElementVisible(self::$_warnings_vue
                . "/div[@class='_icon fas fa-exclamation-triangle _new']", 
                Helper\Acceptance::$wait_medium);
        $I->waitForElementVisible("//div[contains(concat(' ' ,@style, ' '), 'float: left; margin-top:')]",
                Helper\Acceptance::$wait_medium);
        $I->waitForElementVisible("//div[@class='sima-ui-da-wrapper']/div[@class='sima-ui-da-main-icon']", 
                Helper\Acceptance::$wait_medium);
        $I->waitForElementVisible(self::$_company_logo, 
                Helper\Acceptance::$wait_medium);
        $I->waitForElementVisible(self::$_company_logo."/img", 
                Helper\Acceptance::$wait_medium);
        $I->waitForText('SIMA DEMO', Helper\Acceptance::$wait_medium, self::$_company_logo."/span");
    }
    
    public function TopBarMainMenu(AcceptanceTester $I)
    {
        $I->wantTo('TopBarMainMenu - s: 7');
        $I->waitForElementVisible(Homepage_Common::$_email, Helper\Acceptance::$wait_medium);
        $I->waitForText('Mail', Helper\Acceptance::$wait_medium, Homepage_Common::$_email."/span");
        $I->waitForElementVisible(Homepage_Common::$_top_bar_files, Helper\Acceptance::$wait_medium);
        $I->waitForText('Fajlovi', Helper\Acceptance::$wait_medium, Homepage_Common::$_top_bar_files."/span");
        $I->waitForElementVisible(self::$_top_bar_addressbook, 
                Helper\Acceptance::$wait_medium);
        $I->waitForText('Imenik', Helper\Acceptance::$wait_medium, 
                self::$_top_bar_addressbook."/span");
        $I->waitForElementVisible(self::$_top_bar_admin, Helper\Acceptance::$wait_medium);
        $I->waitForText('Admin', Helper\Acceptance::$wait_medium, self::$_top_bar_admin."/span");
        $I->waitForElementVisible(self::$_top_bar_evidention, Helper\Acceptance::$wait_medium);
        $I->waitForText('Evidencije', Helper\Acceptance::$wait_medium, 
                self::$_top_bar_evidention."/span");
        $I->waitForElementVisible(self::$_top_bar_accounting, Helper\Acceptance::$wait_medium);
        $I->waitForText('Finansije', Helper\Acceptance::$wait_medium, 
                self::$_top_bar_accounting."/span");
        $I->waitForElementVisible(self::$_top_bar_accounting2, Helper\Acceptance::$wait_medium);
        $I->waitForText('Finansije 2.0', Helper\Acceptance::$wait_medium, 
                self::$_top_bar_accounting2."/span");
        $I->waitForElementVisible(Homepage_Common::$_top_bar_law, Helper\Acceptance::$wait_medium);
        $I->waitForText('Prava', Helper\Acceptance::$wait_medium, Homepage_Common::$_top_bar_law);
        $I->waitForElementVisible(Homepage_Common::$_top_bar_profile, Helper\Acceptance::$wait_medium);
        $I->waitForText('Profil', Helper\Acceptance::$wait_medium, Homepage_Common::$_top_bar_profile);
    }
    
    public function TopBarNewRequestAndDocs(AcceptanceTester $I)
    {
        $I->wantTo('TopBarNewRequestAndDocs - s: 8');
        $I->waitForElementVisible(self::$_request_right, Helper\Acceptance::$wait_medium);
        $I->waitForElementVisible(self::$_request_right."/img", 
                Helper\Acceptance::$wait_medium);
    }
    
    public function TopBarLogOut(AcceptanceTester $I)
    {
        $I->wantTo('TopBarLogOut - s: 9');
        $I->waitForElementVisible(self::$_log_out, Helper\Acceptance::$wait_medium);
        $I->waitForElementVisible(Homepage_Common::$_log_out, Helper\Acceptance::$wait_medium); 
    }
}