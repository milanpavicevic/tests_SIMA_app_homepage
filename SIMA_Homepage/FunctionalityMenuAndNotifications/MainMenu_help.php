<?php

class MainMenu_help
{
    public static $_tab_line = "//div[@id='sima-main-tabs']"
                . "/div[@class='sima-main-tabs-nav-wrapper']"
                . "/ul[@class='sima-main-tabs-nav ui-sortable']/li[@title='Imenik']";
    public static $_files_field = "//div[@data-code='files']/ul[@id='yw6']";
    public static $_files_search_links = "//ul[@id='yw6']/li/ul/li";
    public static $_addressbook = "//div[@data-code='addressbook']/span[contains(text(),'Imenik')]";
    public static $_addressbook_window = "//div[contains(concat(' ' ,@id, ' '), '_simaAddressbook')]"
                . "/div[@class='sima-page-title sima-layout-fixed-panel ']";
    public static $_addressbook_search_opt = "//div[@class='sima-page-title-nav sima-text-dots _right sima-addressbook-options']/ul";
    public static $_admin_field = "//div[contains(@class,'mm right')]/ul[@id='yw5']";
    public static $_evidention = "//div[@data-code='legal_records']/span[contains(text(),'Evidencije')]";
    public static $_evidention_field = "//div[@data-code='legal_records']/ul[@id='yw4']";
    public static $_accounting = "//div[@data-code='accounting']/span[contains(text(),'Finansije')]";
    public static $_accounting_field = "//div[@data-code='accounting']/ul[@id='yw3']";
    public static $_accounting2 = "//div[@data-code='accounting2']/span[contains(text(),'Finansije 2.0')]";
    public static $_accounting_field2 = "//div[@data-code='accounting2']/ul[@id='yw2']";
    public static $_top_bar_law_field = "//div[@data-code='legal']/ul[@id='yw1']";
    public static $_top_bar_profile_field = "//div[@data-code='profile']/ul[@id='yw0']";
    public static $_new_request = "//div[@title='Dodaj novi zahtev']/img";
    public static $_new_request_window = "//div[contains(concat(' ' ,@class, ' '), 'ui-dialog ui-widget')]"
            . "/div[contains(concat(' ' ,@class, ' '), 'sima-dialog-position-full-screen')]";
    public static $_new_request_titlebar = "//div[contains(concat(' ' ,@class, ' '), 'ui-dialog ui-widget')]"
            . "/div[contains(concat(' ' ,@class, ' '), 'ui-dialog-titlebar')]";
    public static $_new_request_save = "//div[contains(concat(' ' ,@class, ' '), 'ui-dialog ui-widget')]"
            . "/div[contains(concat(' ' ,@class, ' '), 'sima-dialog-position-full-screen')]"
            . "/div[@class='sima-model-form-row-button']/span[contains(text(),'Sačuvaj')]";
    public static $_new_request_form_wrapper = "//div[contains(concat(' ' ,@class, ' '), 'ui-dialog ui-widget')]"
            . "/div[contains(concat(' ' ,@class, ' '), 'sima-dialog-position-full-screen')]"
            . "/div[contains(concat(' ' ,@data-form_data, ' '), 'ClientBafRequest')]"
            . "/div[contains(concat(' ' ,@class, ' '), 'mutual_form_wrapper _model-group')]";
    public static $_email_id = 'yw7';
    public static $_files_id = 'yw6';
    public static $_admin_id = 'yw5';
    public static $_evidention_id = 'yw4';
    public static $_accounting_id = 'yw3';
    public static $_accounting2_id = 'yw2';
    public static $_law_id = 'yw1';
    public static $_profile_id = 'yw0';
    
    public static $_notifications_string = "Obaveštenja";

        public static function FirstLinksMouse($I, $testID, $tag, $name)
    {
        $I->waitForElementVisible("//ul[@id='".$testID."']/li/".$tag."[contains(text(),'".$name."')]",
                Helper\Acceptance::$wait_medium);
        $I->moveMouseOver("//ul[@id='".$testID."']/li/".$tag."[contains(text(),'".$name."')]",
                Helper\Acceptance::$wait_medium);
    }
    
    public static function FirstLinksCheckText($I, $testID, $tag, $name)
    {
        $I->waitForElementVisible("//ul[@id='".$testID."']/li/".$tag."[contains(text(),'".$name."')]",
                Helper\Acceptance::$wait_medium);
    }
    
    public static function SecondLinks($I, $testID, $name)
    {                             
        $I->waitForElementVisible("//ul[@id='".$testID."']/li/ul/li/a[contains(text(),'".$name."')]");
    }
    
    public static function ThirdLinks($I, $testID, $name)
    {
        $I->waitForElementVisible("//ul[@id='".$testID."']/li/ul/li/ul/li/a[contains(text(),'".$name."')]",
                Helper\Acceptance::$wait_medium);
    }
}