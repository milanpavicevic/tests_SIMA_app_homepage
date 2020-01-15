<?php

include_once dirname(dirname(__FILE__)) . '/Homepage_Common.php';

class Tabs_help
{
    public static $_email_tab_title = "/li[@title='Email']";
    public static $_pinned_email_tab = "/li[@title='Email'][@class='starred']";
    public static $_pinned_hovered_tab = "[@class='sima-ui-active overStarred starred']";
    public static $_my_documents = "//ul[@id='yw6']/li/a[contains(text(),'Moja Dokumenta')]";
    public static $_garbage = "//ul[@id='yw6']/li/a[contains(text(),'Kanta')]";
    public static $_tab_my_documents = "//li[@title='Moja Dokumenta']";
    public static $_tab_garbage = "//li[@title='Kanta - tabela']";
    public static $_tab_foreign_systems = "//li[@title='Strani sistemi']";
    public static $_email_id = 'yw7';
    public static $_files_id = 'yw6';
    public static $_admin_id = 'yw5';
    public static $_tab_left_arrow = "//div[@class='sima-main-tabs-right-scroll']";
    public static $_tab_right_arrow = "//div[@id='sima-main-tabs']/div[@class='sima-main-tabs-left-scroll']";    
    public static $password = 'XXXXXXXX';
    public static $username = 'YYYYYYYY';

        public static function OpenManyTabs(AcceptanceTester $I)
    {
        for ($i = 1; $i <= 17; $i++) {
            $I->waitForElementVisible(Homepage_Common::$_top_bar_admin, Helper\Acceptance::$wait_medium);
            $I->moveMouseOver(Homepage_Common::$_top_bar_admin);
                if($i==12) {
                    continue;
                }
            $I->waitForElementVisible("//ul[@id='yw5']/li[".$i."]", Helper\Acceptance::$wait_medium);
            $I->click("//ul[@id='yw5']/li[".$i."]");
            $I->waitLoading($I);
        }
    }
    
    public static function ShortloginAsUser($I, $username, $password)
    {
        $I->waitForElementVisible(Helper\Acceptance::$login_form_username, Helper\Acceptance::$wait_long);
        $I->waitForElementVisible(Helper\Acceptance::$login_form_password, Helper\Acceptance::$wait_long);
        $I->fillField(Helper\Acceptance::$login_form_username, $username);
        $I->fillField(Helper\Acceptance::$login_form_password, $password);
        $I->waitForElementVisible(Helper\Acceptance::$submit_button, Helper\Acceptance::$wait_long);
        $I->click(Helper\Acceptance::$submit_button);
        $I->waitForElementVisible(Helper\Acceptance::$company_logo, Helper\Acceptance::$wait_long);
        $I->waitForText('SIMA DEMO', Helper\Acceptance::$wait_long, Helper\Acceptance::$company_logo);
        //postoje sanse da duze treba loading-u da se samo pojavi, pa treba wait za zadacice
        //$I->waitLoading($I, self::$_active_tasks_panel, self::$wait_fast);
        $I->waitLoading($I);
        $I->waitForText('Zadačići', Helper\Acceptance::$wait_long, Helper\Acceptance::$_title_little_tasks);
        $I->waitForText(Homepage_Common::$_working_tasks_string, Helper\Acceptance::$wait_long, Helper\Acceptance::$_title_work_tasks);
    }
}