<?php

class Homepage_Common
{
    public static $_tab_homepage = "//li[@title='Početna']";
    public static $_top_bar_logo = "//div[@class='brend left']";
    public static $_tab_drop_menue = "//div[@id='page']/div[@id='sima-main-tabs']/div[@class='sima-main-tabs-arrow-down']";
    public static $_tab_drop_menue_content = "//div[@id='sima-main-tabs']/div[@class='sima-main-tabs-list-tabs']/ul";
    public static $_top_bar_legal_filingBook = "//ul[@class='sima-main-tabs-nav ui-sortable']/li[@title='Zavodna knjiga']";
    public static $_messages_icon = "//div[@class='notifs_messages_wrapper']/div[@class='messages']";
    public static $_notification_bell = "//div[@id='sima-notifications']/i[@class='_icon fas fa-bell']";
    public static $_email = "//div[@class='mm right'][@data-code='messages']";
    public static $_top_bar_files = "//div[@id='top_bar']/div[@data-code='files']";
    public static $_my_documents = "//ul[@id='yw6']/li/a[contains(text(),'Moja Dokumenta')]";
    public static $_top_bar_admin = "//div[@data-code='admin']/span[contains(text(),'Admin')]";
    public static $_tab_line = "//div[@id='sima-main-tabs']"
                . "/div[@class='sima-main-tabs-nav-wrapper']"
                . "/ul[@class='sima-main-tabs-nav ui-sortable']";
    public static $_refresh_icon = "/span[@class='sima-icon-refresh']";
    public static $_close_icon = "/span[@class='sima-icon-close']";
    public static $_top_bar_wiki_icon = "//div[@class='mm mm-wiki right']"
            . "[contains(concat(' ' ,@onclick, ' '), 'sima.icons.personalWiki')]";
    public static $_top_bar_law = "//div[@data-code='legal']/span[contains(text(),'Prava')]";
    public static $_top_bar_profile = "//div[@data-code='profile']/span[contains(text(),'Profil')]";
    public static $_sima_dokumentacija = "//div[@class='mm mm-wiki right']/img[@alt='SIMA Dokumentacija']";
    public static $_log_out = "//div[@onclick='sima.logout();']";
    public static $_little_tasks_add_task = "//div[contains(concat(' ' ,@class, ' '), 'feature_tasks')]"
            . "/div[@class='sima-layout-panel _horizontal _has_layout_children']"
            . "/div[@class='active_tasks_toolbox sima-layout-fixed-panel']/h4"
            . "/div[contains(concat(' ',@data-onclick, ' '), 'feature_task')]/span";
    public static $_little_tasks_window_header = "//div[@role='dialog']/div[contains(concat(' ' ,@class, ' '), 'ui-widget-header')]";
    public static $_little_tasks_window_main = "//div[@role='dialog']/div[contains(concat(' ' ,@class, ' '), 'ui-dialog-content')]";
    public static $_tasks_panel_ribbon = "//div[contains(concat(' ' ,@class, ' '), 'feature_tasks')]"
                ."/div[@class='sima-layout-panel _horizontal _has_layout_children']"
                ."/div[@class='active_tasks_toolbox sima-layout-fixed-panel']";
    public static $_little_tasks_info = "//div[contains(concat(' ' ,@class, ' '), 'feature_tasks')]"
                ."/div[@class='sima-layout-panel _horizontal _has_layout_children']"
                ."/div[@class='active_tasks_task_list task_list sima-layout-panel']"
                ."/div[@class='sima-model-view public-tasks_15 sima-ui-feature-active_task']";
    public static $_tab_email = "//div[@id='sima-main-tabs']/div[@class='sima-main-tabs-nav-wrapper']"
            . "/ul[@class='sima-main-tabs-nav ui-sortable']/li[@data-code='messages/email']";
    public static $_mail_overview = "//ul[@id='yw7']/li/a";
    public static $_app_message_login = "//h1[@class='heading-1']";
    public static $_dropmenue_item2 = "//div[@id='sima-main-tabs']/div[@class='sima-main-tabs-list-tabs']/ul/li[@title='new tab2']";
    public static $_working_task_panel = "//div[contains(concat(' ' ,@class, ' '), 'working_tasks')]"
                . "/div[@class='sima-layout-panel _horizontal _has_layout_children']"
                . "/div[@class='active_tasks_toolbox sima-layout-fixed-panel']";
    public static $_email_overview_check = "//ul[@id='yw3']/li/a[contains(text(),'Pregled')]";
        
    public static $_working_tasks_string = "Radni zadaci";
    public static $_sima_string = 'SIMA';
    public static $_little_task_string = "Zadačić:";
    public static $_days_left_string = "Broju preostalih dana";
    public static $_deadline_string = "Roku isteka";
    public static $_priority_string = "Prioritetu";
    public static $_days_left_value = "end-begin";
    public static $_deadline_value = "deadline";
    public static $_priority_value = "priority";
    public static $_beginning_string = "Početna";
    public static $_my_documents_string = "Moja Dokumenta";
    public static $_garbage_string = "Kanta - tabela";
    public static $_last_opened_tab = "/li[@title='Strani sistemi']";

        public static function CallEmailOverviewCheck(AcceptanceTester $I)
    {
        $I->waitForElementVisible(self::$_email, Helper\Acceptance::$wait_medium);
        $I->moveMouseOver(self::$_email);
        $I->waitForText('Pregled', Helper\Acceptance::$wait_medium, self::$_mail_overview);
        $I->click("//ul[@id='yw7']/li/a[contains(text(),'Pregled')]");
        $I->waitLoading($I);
        $I->waitForElementVisible(self::$_tab_email, Helper\Acceptance::$wait_medium);
    }
    
    public static function EmployeeCallEmailOverviewCheck(AcceptanceTester $I)
    {
        $I->waitForElementVisible(self::$_email, Helper\Acceptance::$wait_medium);
        $I->moveMouseOver(self::$_email);
        $I->waitForElementVisible(self::$_email_overview_check, Helper\Acceptance::$wait_medium);
        $I->click(self::$_email_overview_check);
        $I->waitLoading($I);
        $I->waitForElementVisible(self::$_tab_email, Helper\Acceptance::$wait_medium);
    }
}