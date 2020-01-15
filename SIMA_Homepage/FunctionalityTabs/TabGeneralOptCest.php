<?php

include_once dirname(dirname(__FILE__)) . '/Homepage_Common.php';
include_once 'Tabs_help.php';

class TabGeneralOptCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->loginAsAdminUser($I);
    }

    public function _after(AcceptanceTester $I)
    {   
    }
    
    public function CheckTabs(AcceptanceTester $I)
    {
        $I->wantTo('CheckTabs - s: 2');
        $I->waitForText(Homepage_Common::$_beginning_string, Helper\Acceptance::$wait_medium,
                Homepage_Common::$_tab_line);
        Homepage_Common::CallEmailOverviewCheck($I);
    }
    
    public function RefreshTab(AcceptanceTester $I)
    {
        $I->wantTo('RefreshTab - s: 17');
        $I->waitForElementVisible(Homepage_Common::$_top_bar_files, Helper\Acceptance::$wait_medium);
        $I->moveMouseOver(Homepage_Common::$_top_bar_files);
        $I->waitForElementVisible(Tabs_help::$_my_documents, Helper\Acceptance::$wait_medium);
        $I->click(Tabs_help::$_my_documents);
        $I->waitForText(Homepage_Common::$_my_documents_string, Helper\Acceptance::$wait_medium,
                Tabs_help::$_tab_my_documents);
        $I->waitForElementVisible(Homepage_Common::$_tab_line."/li[@title='".Homepage_Common::$_my_documents_string
                ."']/".Homepage_Common::$_refresh_icon, Helper\Acceptance::$wait_medium);
        $I->click(Homepage_Common::$_tab_line."/li[@title='".Homepage_Common::$_my_documents_string."']"
                .Homepage_Common::$_refresh_icon);
        $I->waitLoading($I);
    }
    
    public function IconsVisibilityAndClose(AcceptanceTester $I)
    {
        $I->wantTo('IconsVisibilityAndClose - s: 18');
        $I->waitForElementVisible(Homepage_Common::$_email, Helper\Acceptance::$wait_medium);
        $I->moveMouseOver(Homepage_Common::$_email);
        $I->waitForText('Pregled', Helper\Acceptance::$wait_medium, Homepage_Common::$_mail_overview);
        $I->click(Homepage_Common::$_mail_overview);
        $I->waitLoading($I);
        $I->waitForElementVisible(Homepage_Common::$_tab_email, Helper\Acceptance::$wait_medium);
        $I->waitForElementVisible(Homepage_Common::$_tab_email.Homepage_Common::$_refresh_icon, 
                Helper\Acceptance::$wait_medium);
        $I->waitForElementVisible(Homepage_Common::$_tab_email.Homepage_Common::$_close_icon, 
                Helper\Acceptance::$wait_medium);
        $I->waitForElementVisible(Homepage_Common::$_tab_line.Homepage_Common::$_tab_homepage,
                Helper\Acceptance::$wait_medium);
        $I->click(Homepage_Common::$_tab_homepage);
        $I->waitForElementVisible('//ul/li[@class="ui-sortable-handle sima-ui-active"]',
                Helper\Acceptance::$wait_medium);
        $I->waitForElementNotVisible(Homepage_Common::$_tab_email.Homepage_Common::$_refresh_icon, 
                Helper\Acceptance::$wait_medium);
        $I->waitForElementNotVisible(Homepage_Common::$_tab_email.Homepage_Common::$_close_icon, 
                Helper\Acceptance::$wait_medium);
        $I->moveMouseOver(Homepage_Common::$_tab_email);
        $I->waitForElementVisible(Homepage_Common::$_tab_email.Homepage_Common::$_close_icon, 
                Helper\Acceptance::$wait_medium);
        $I->click(Homepage_Common::$_tab_email.Homepage_Common::$_close_icon);
        $I->waitForElementNotVisible(Homepage_Common::$_tab_email, Helper\Acceptance::$wait_medium);
    }
    
    public function PinAndUnpinTab(AcceptanceTester $I, $scenario)
    {
        $I->wantTo('PinAndUnpinTab - s: 16');
        $scenario->incomplete('Test se ne izvrsava zbog bezbednosti aplikacije.');
        Homepage_Common::CallEmailOverviewCheck($I);
        $I->clickWithLeftButton(Homepage_Common::$_tab_email, 10, 5);
        $var = $I->grabAttributeFrom(Homepage_Common::$_tab_email, 'class');
        error_log(__METHOD__.' - $var: '.SIMAMisc::toTypeAndJsonString($var));
        $I->waitForElementVisible(Homepage_Common::$_tab_email.Tabs_help::$_pinned_hovered_tab,
                Helper\Acceptance::$wait_medium );
        $I->waitForElementVisible(Homepage_Common::$_tab_email."[contains(concat(' ' ,@class, ' '), 'sima-ui-active')]",
                Helper\Acceptance::$wait_medium );
        $I->waitForElementVisible(Homepage_Common::$_log_out, Helper\Acceptance::$wait_medium);
        $I->click(Homepage_Common::$_log_out);
        $I->waitForText('SIMA - Prijavite se', Helper\Acceptance::$wait_medium,
                Homepage_Common::$_app_message_login);
        Tabs_help::ShortloginAsUser($I, Tabs_help::$username, Tabs_help::$password);
        $I->waitForElementVisible(Homepage_Common::$_tab_line.Tabs_help::$_pinned_email_tab,
                Helper\Acceptance::$wait_medium_long);
        $I->clickWithLeftButton(Homepage_Common::$_tab_line.Tabs_help::$_pinned_email_tab, 10, 5);
        $I->waitForElementNotVisible(Homepage_Common::$_tab_email.Tabs_help::$_pinned_hovered_tab,
                Helper\Acceptance::$wait_medium );
        $I->waitForElementVisible(Homepage_Common::$_log_out, Helper\Acceptance::$wait_medium);
        $I->click(Homepage_Common::$_log_out);
        $I->waitForText('SIMA - Prijavite se', Helper\Acceptance::$wait_medium,
                Homepage_Common::$_app_message_login);
        Tabs_help::ShortloginAsUser($I, Tabs_help::$username, Tabs_help::$password);
        $I->waitForElementNotVisible(Homepage_Common::$_tab_email, Helper\Acceptance::$wait_medium);
    }
}