<?php

include_once 'ContentReview_help.php';

class TasksCest 
{    
    public function _before(AcceptanceTester $I)
    {
        $I->loginAsAdminUser($I);
    }

    public function _after(AcceptanceTester $I)
    {
    }
    
    public static $_feature_tasks_panel = "//div[contains(concat(' ' ,@class, ' '), 'feature_tasks')]";
    public static $_feature_task = "//div[contains(concat(' ' ,@class, ' '), 'feature_tasks')]"
                ."/div[@class='sima-layout-panel _horizontal _has_layout_children']"
                ."/div[@class='active_tasks_toolbox sima-layout-fixed-panel']";
    public static $_active_task_info = "//div[contains(concat(' ' ,@class, ' '), 'feature_tasks')]"
                ."/div[@class='sima-layout-panel _horizontal _has_layout_children']"
                ."/div[@class='active_tasks_task_list task_list sima-layout-panel']"
                ."/div[@class='sima-model-view public-tasks_15 sima-ui-feature-active_task']";
    public static $_active_task_info_span = "/span[@class='title']";

    public function TasksPanel(AcceptanceTester $I)
    {
        $I->wantTo('TasksPanel - s: 11');
        $I->waitForText('Zadačići', Helper\Acceptance::$wait_medium, Homepage_Common::$_tasks_panel_ribbon.'/h4');
        $I->waitForElementVisible(Homepage_Common::$_little_tasks_add_task,
                Helper\Acceptance::$wait_medium);
        $I->waitForElementVisible(Homepage_Common::$_tasks_panel_ribbon.'/h4', Helper\Acceptance::$wait_medium);
        $I->waitForElementVisible(self::$_feature_task
                ."/select[@class='select_type_sort']", Helper\Acceptance::$wait_medium);
        $I->waitForElementVisible(self::$_feature_tasks_panel.ContentReview_help::$_refresh_icon,
                Helper\Acceptance::$wait_medium);
    }
    
    public function ActiveTaskBasicInfo(AcceptanceTester $I)
    {
        $I->wantTo('ActiveTaskBasicInfo - s: 12');
        $I->waitForText(Homepage_Common::$_little_task_string, Helper\Acceptance::$wait_medium, self::$_active_task_info); 
        $I->waitForElementVisible(self::$_active_task_info 
                ."/div[@class='priority']".self::$_active_task_info_span."[contains(text(),'Prioritet:')]",
                Helper\Acceptance::$wait_medium);
        $I->waitForElementVisible(self::$_active_task_info
                ."/div[@class='day_report']".self::$_active_task_info_span."[contains(text(),'Dnevni izveštaj:')]",
                Helper\Acceptance::$wait_medium);
        $I->waitForElementVisible(self::$_active_task_info."//span[@class='sima-icon _add _16']",
                Helper\Acceptance::$wait_medium);
        $I->waitForElementVisible(self::$_active_task_info
                ."/div[@class='sima-ui-feature-active_task-path']"
                .self::$_active_task_info_span."[contains(text(),'Putanja do zadatka:')]",
                Helper\Acceptance::$wait_medium);
    }
}