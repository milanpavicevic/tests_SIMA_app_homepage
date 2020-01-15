<?php

include_once dirname(dirname(__FILE__)) . '/Homepage_Common.php';
include_once 'Tabs_help.php';

class TabScrollCest
{
    public function _after(AcceptanceTester $I)
    {   
    }
    
    public static $_DarkoPerisic_myFiles = "//ul[@id='yw3']/li/a[contains(text(),'Moja Dokumenta')]";
    public static $_DarkoPerisic_garbage = "//ul[@id='yw3']/li/a[contains(text(),'Kanta')]";


    public function DragAndDropTabs(AcceptanceTester $I)
    {
        $I->wantTo('DragAndDropTabs - s: 1');
        $I->loginAsDarkoPerisic($I);
        $I->waitForElementVisible(Homepage_Common::$_top_bar_files, Helper\Acceptance::$wait_medium);
        $I->moveMouseOver(Homepage_Common::$_top_bar_files);
        $I->waitForElementVisible(self::$_DarkoPerisic_myFiles, Helper\Acceptance::$wait_medium);
        $I->click(self::$_DarkoPerisic_myFiles);
        $I->waitForElementVisible(self::$_DarkoPerisic_garbage, Helper\Acceptance::$wait_medium);
        $I->click(self::$_DarkoPerisic_garbage);
        $I->waitForElementVisible(Tabs_help::$_tab_my_documents, Helper\Acceptance::$wait_medium);
        $I->dragAndDropBy(Tabs_help::$_tab_my_documents, 100, 0);
        $I->waitForElementVisible(Homepage_Common::$_tab_line."/li[3]/a[@title='".Homepage_Common::$_garbage_string."']",
                Helper\Acceptance::$wait_medium);
        $I->dragAndDropBy(Tabs_help::$_tab_my_documents, 200, 0);
        $I->waitForText(Homepage_Common::$_my_documents_string, Helper\Acceptance::$wait_medium,
                Homepage_Common::$_tab_line.'/li[3]');
        $I->dragAndDropBy(Tabs_help::$_tab_my_documents, -100, 0);
        $I->waitForText(Homepage_Common::$_garbage_string, Helper\Acceptance::$wait_medium,
                Homepage_Common::$_tab_line.'/li[2]');
        $I->dragAndDropBy(Tabs_help::$_tab_my_documents, -200, 0);
        $I->waitForText(Homepage_Common::$_garbage_string, Helper\Acceptance::$wait_medium,
                Homepage_Common::$_tab_line.'/li[3]');
        $I->waitForElementVisible(Homepage_Common::$_tab_homepage, Helper\Acceptance::$wait_medium);
        $I->dragAndDropBy(Homepage_Common::$_tab_homepage, 200, 0);
        $I->waitForText(Homepage_Common::$_my_documents_string, Helper\Acceptance::$wait_medium,
                Homepage_Common::$_tab_line.'/li[2]');
        $I->waitForElementVisible(Homepage_Common::$_tab_line.'/li[1]/a[contains(text(),"'
                .Homepage_Common::$_beginning_string.'")]', Helper\Acceptance::$wait_medium);
    }    
    
    public function TabLeftArrow(AcceptanceTester $I)
    {
        $I->wantTo('TabLeftArrow - s: 4');
        $I->loginAsAdminUser($I);
        Tabs_help::OpenManyTabs($I);
        $I->waitForElementVisible(Tabs_help::$_tab_left_arrow, Helper\Acceptance::$wait_medium);
    }

    public function TabRightArrow(AcceptanceTester $I)
    {
        $I->wantTo('TabRightArrow - s: 5');
        $I->loginAsAdminUser($I);
        Tabs_help::OpenManyTabs($I);
        $I->waitForElementVisible(Tabs_help::$_tab_left_arrow, Helper\Acceptance::$wait_medium);
        $I->click(Tabs_help::$_tab_left_arrow);
        $I->waitForElementVisible(Tabs_help::$_tab_right_arrow, Helper\Acceptance::$wait_medium);
    }
    
    public function ScrollTabsLeft(AcceptanceTester $I)
    {
        $I->wantTo('ScrollTabsLeft - s: 6');
        $I->loginAsAdminUser($I);
        Tabs_help::OpenManyTabs($I);
        $I->waitForElementNotVisible(Homepage_Common::$_tab_homepage, Helper\Acceptance::$wait_medium_long);
        $I->waitForElementVisible(Tabs_help::$_tab_foreign_systems, Helper\Acceptance::$wait_medium);
        $I->waitForElementVisible(Tabs_help::$_tab_left_arrow, Helper\Acceptance::$wait_medium);
        $I->click(Tabs_help::$_tab_left_arrow);
        $I->waitForElementNotVisible(Tabs_help::$_tab_foreign_systems.Homepage_Common::$_close_icon,
                Helper\Acceptance::$wait_medium);
    }
        
    public function ScrollTabsRight(AcceptanceTester $I)
    {
        $I->wantTo('ScrollTabsRight - s: 7');
        $I->loginAsAdminUser($I);
        Tabs_help::OpenManyTabs($I);
        $I->waitForElementVisible(Tabs_help::$_tab_left_arrow, Helper\Acceptance::$wait_medium);
        $I->click(Tabs_help::$_tab_left_arrow);
        $I->waitForElementVisible(Tabs_help::$_tab_right_arrow, Helper\Acceptance::$wait_medium);
        $I->click(Tabs_help::$_tab_right_arrow);
        $I->waitForElementNotVisible(Homepage_Common::$_tab_line.Homepage_Common::$_tab_homepage,
                Helper\Acceptance::$wait_medium);
    }
    
    public function LeftArrowDissapears(AcceptanceTester $I)
    {
        $I->wantTo('LeftArrowDissapears - s: 8');
        $I->loginAsAdminUser($I);
        Tabs_help::OpenManyTabs($I);
        $I->waitForElementVisible(Tabs_help::$_tab_left_arrow, Helper\Acceptance::$wait_medium);
        $I->click(Tabs_help::$_tab_left_arrow);
        $I->waitForElementNotVisible(Tabs_help::$_tab_left_arrow, Helper\Acceptance::$wait_medium);
        $I->waitForElementVisible(Tabs_help::$_tab_right_arrow, Helper\Acceptance::$wait_medium);
    }
    
    public function RightArrowDissapears(AcceptanceTester $I)
    {
        $I->wantTo('RightArrowDissapears - s: 9');
        $I->loginAsAdminUser($I);
        Tabs_help::OpenManyTabs($I);
        $I->waitForElementVisible(Tabs_help::$_tab_left_arrow, Helper\Acceptance::$wait_medium);
        $I->click(Tabs_help::$_tab_left_arrow);
        $I->waitForElementVisible(Tabs_help::$_tab_right_arrow, Helper\Acceptance::$wait_medium);
        $I->click(Tabs_help::$_tab_right_arrow);
        $I->waitForElementNotVisible(Homepage_Common::$_tab_line.Homepage_Common::$_tab_homepage,
                Helper\Acceptance::$wait_medium);
        $I->waitForElementNotVisible(Tabs_help::$_tab_right_arrow, Helper\Acceptance::$wait_medium);
        $I->waitForElementVisible(Tabs_help::$_tab_left_arrow, Helper\Acceptance::$wait_medium);
    }
  
    public function LeftArrowAppears(AcceptanceTester $I)
    {
        $I->wantTo('LeftArrowAppears - s: 10');
        $I->loginAsAdminUser($I);
        Tabs_help::OpenManyTabs($I);
        $I->waitForElementVisible(Tabs_help::$_tab_left_arrow, Helper\Acceptance::$wait_medium);
        $I->click(Tabs_help::$_tab_left_arrow);
        $I->waitForElementVisible(Tabs_help::$_tab_right_arrow, Helper\Acceptance::$wait_medium);
        $I->click(Tabs_help::$_tab_right_arrow);
        $I->waitForElementVisible(Tabs_help::$_tab_left_arrow, Helper\Acceptance::$wait_medium);
    }
    
    public function RightArrowAppears(AcceptanceTester $I)
    {
        $I->wantTo('RightArrowAppears - s: 11');
        $I->loginAsAdminUser($I);
        Tabs_help::OpenManyTabs($I);
        $I->waitForElementVisible(Tabs_help::$_tab_left_arrow, Helper\Acceptance::$wait_medium);
        $I->click(Tabs_help::$_tab_left_arrow);
        $I->waitForElementVisible(Tabs_help::$_tab_right_arrow, Helper\Acceptance::$wait_medium);
        $I->click(Tabs_help::$_tab_right_arrow);
        $I->waitForElementNotVisible(Homepage_Common::$_tab_line.Homepage_Common::$_tab_homepage,
                Helper\Acceptance::$wait_medium);
        $I->waitForElementVisible(Tabs_help::$_tab_left_arrow, Helper\Acceptance::$wait_medium);
        $I->click(Tabs_help::$_tab_left_arrow);
        $I->waitForElementVisible(Tabs_help::$_tab_right_arrow, Helper\Acceptance::$wait_medium);
    }
    
    public function TabNarrowRightArrowDissapp(AcceptanceTester $I)
    {
        $I->wantTo('TabNarrowRightArrowDissapp - s: 12');
        $I->loginAsAdminUser($I);
        Tabs_help::OpenManyTabs($I);
        $I->waitForElementVisible(Tabs_help::$_tab_left_arrow, Helper\Acceptance::$wait_medium);
        $I->click(Tabs_help::$_tab_left_arrow);
        $I->waitForElementVisible(Tabs_help::$_tab_right_arrow, Helper\Acceptance::$wait_medium);
        $I->click(Tabs_help::$_tab_right_arrow);
        $I->waitForElementVisible(Homepage_Common::$_tab_line.Homepage_Common::$_last_opened_tab, 
                Helper\Acceptance::$wait_medium);
        $I->click(Homepage_Common::$_tab_line.Homepage_Common::$_last_opened_tab);
        $I->waitForElementVisible(Homepage_Common::$_tab_line.Homepage_Common::$_last_opened_tab
                .Homepage_Common::$_close_icon, Helper\Acceptance::$wait_medium);
        $I->click(Homepage_Common::$_tab_line.Homepage_Common::$_last_opened_tab.Homepage_Common::$_close_icon);
        $I->waitForElementNotVisible(Tabs_help::$_tab_right_arrow, Helper\Acceptance::$wait_medium);
    }   
    
    public function ScrollTabsByWheel(AcceptanceTester $I, $scenario)
    {
        $I->wantTo('ScrollTabsByWheel - s: 19');
        $scenario->incomplete('Scenario se ne izvrsava jer nije podrzana funkcija scrollTo().');
        $I->loginAsAdminUser($I);
        Tabs_help::OpenManyTabs($I);
        $I->waitForElementVisible(Homepage_Common::$_tab_line, Helper\Acceptance::$wait_medium);
        $I->moveMouseOver(Homepage_Common::$_tab_line);
//        $I->scrollTo('ul.sima-main-tabs-nav.ui-sortable li:nth-child(1)');
//        $I->waitForElementVisible(Homepage_Common::$_tab_line, Helper\Acceptance::$wait_medium);
        $I->moveMouseOver(Homepage_Common::$_tab_line, 10);
        $I->waitForElementVisible(Homepage_Common::$_tab_line.Homepage_Common::$_tab_homepage,
                Helper\Acceptance::$wait_medium);
        $I->waitForElementNotVisible(Homepage_Common::$_tab_line.Homepage_Common::$_last_opened_tab,
                Helper\Acceptance::$wait_medium);
        $I->waitForElementVisible(Tabs_help::$_tab_right_arrow, Helper\Acceptance::$wait_medium);
        $I->waitForElementNotVisible(Tabs_help::$_tab_left_arrow, Helper\Acceptance::$wait_medium);
        $I->scrollTo(Homepage_Common::$_tab_line.Homepage_Common::$_last_opened_tab);
        $I->waitForElementVisible(Homepage_Common::$_tab_line.Homepage_Common::$_last_opened_tab,
                Helper\Acceptance::$wait_medium);
        $I->waitForElementVisible(Tabs_help::$_tab_left_arrow, Helper\Acceptance::$wait_medium);
        $I->waitForElementNotVisible(Tabs_help::$_tab_right_arrow, Helper\Acceptance::$wait_medium);
    }
}