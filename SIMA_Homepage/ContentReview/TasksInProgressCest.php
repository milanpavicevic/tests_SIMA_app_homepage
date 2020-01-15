<?php

    include_once 'ContentReview_help.php';

class TasksInProgressCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->loginAsAdminUser($I);
    }

    public function _after(AcceptanceTester $I)
    {
    }
    
    public static $_working_tasks = "//div[contains(concat(' ' ,@class, ' '), 'working_tasks')]";
    public static $_working_task_list = "//div[contains(concat(' ' ,@class, ' '), 'working_tasks')]"
            . "/div[@class='sima-layout-panel _horizontal _has_layout_children']"
            . "/div[@class='active_tasks_task_list task_list sima-layout-panel']"
            . "/div[@class='sima-model-view public-tasks_5 sima-ui-working-active_task']";


    public function WorkingTasksPanel(AcceptanceTester $I)
    {
        $I->wantTo('WorkingTasksPanel - s: 13');
        $I->waitForElementVisible(Homepage_Common::$_working_task_panel
                ."/h4[contains(text(),'".Homepage_Common::$_working_tasks_string."')]",
                Helper\Acceptance::$wait_medium);
        $I->waitForElementVisible(Homepage_Common::$_working_task_panel
                ."/h4[contains(text(),'".Homepage_Common::$_working_tasks_string."')]/div[@title='Izmeni']",
                Helper\Acceptance::$wait_medium);
        $I->waitForText('Poredjaj po:', Helper\Acceptance::$wait_medium,
                Homepage_Common::$_working_task_panel."/span[1]");
        $I->waitForElementVisible(Homepage_Common::$_working_task_panel
                ."/select[@class='select_type_sort']", Helper\Acceptance::$wait_medium);
        $I->waitForElementVisible(self::$_working_tasks.ContentReview_help::$_refresh_icon,
                Helper\Acceptance::$wait_medium);
    }
    
    public function WorkingTasksList(AcceptanceTester $I)
    {
        $I->wantTo('WorkingTasksList - s: 14');
        $I->waitForText('Zadatak:', Helper\Acceptance::$wait_medium,
                self::$_working_task_list."/p");
        $I->waitForElementVisible(self::$_working_task_list
                ."/p/span[@class='sima-ui-task-expired_deadline']", Helper\Acceptance::$wait_medium);
        $I->waitForText('Prioritet', Helper\Acceptance::$wait_medium,
                self::$_working_task_list."/div[@class='priority']");
        $I->waitForText('Izveštaj:', Helper\Acceptance::$wait_medium,
                self::$_working_task_list."/div[@class='day_report']");
        $I->waitForElementVisible(self::$_working_task_list."/div[@class='day_report']"
                . "/span[@title='Dodaj dnevni izveštaj']", Helper\Acceptance::$wait_medium);
        $I->waitForText('Putanja do zadatka:', Helper\Acceptance::$wait_medium, 
                self::$_working_task_list."/div[@class='sima-ui-working-active_task-path']");
    }
}