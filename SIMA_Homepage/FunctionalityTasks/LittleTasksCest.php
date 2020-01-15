<?php

include_once dirname(dirname(__FILE__)) . '/Homepage_Common.php';
include_once 'LittleTasks_help.php';

class LittleTasksCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->loginAsAdminUser($I);
    }

    public function _after(AcceptanceTester $I)
    {   
    }

    public function AddTask(AcceptanceTester $I)
    {
        $I->wantTo('AddTask - s: 27');
        $I->waitForElementVisible(Homepage_Common::$_little_tasks_add_task,
                Helper\Acceptance::$wait_medium);
        $I->click(Homepage_Common::$_little_tasks_add_task);
        $I->waitForText(Homepage_Common::$_sima_string, Helper\Acceptance::$wait_medium,
                Homepage_Common::$_little_tasks_window_header."/span");
        $I->waitForElementVisible(Homepage_Common::$_little_tasks_window_header.
                "/button[@title='Close']", Helper\Acceptance::$wait_medium);
        $I->waitForText('Zadatak', Helper\Acceptance::$wait_medium, 
                Homepage_Common::$_little_tasks_window_main
                ."/div[contains(concat(' ' ,@class, ' '), 'sima-model-forms')]"
                . "/div[contains(concat(' ' ,@class, ' '), 'form_wrapper')]");
        $I->waitForText('Sačuvaj', Helper\Acceptance::$wait_medium, 
                Homepage_Common::$_little_tasks_window_main
                ."/div[contains(concat(' ' ,@class, ' '), 'form-row-button')]");
    }
    
    public function LittleTaskPriorityDropMenu(AcceptanceTester $I)
    {
        $I->wantTo('LittleTaskPriorityDropMenu - s: 28');
        $I->waitForElementVisible(Homepage_Common::$_tasks_panel_ribbon."/select", Helper\Acceptance::$wait_medium);
        $I->click(Homepage_Common::$_tasks_panel_ribbon."/select");
        $I->waitForText(Homepage_Common::$_days_left_string, Helper\Acceptance::$wait_medium,
                Homepage_Common::$_tasks_panel_ribbon."/select/option[@value='".Homepage_Common::$_days_left_value."']");
        $I->waitForText(Homepage_Common::$_deadline_string, Helper\Acceptance::$wait_medium,
                Homepage_Common::$_tasks_panel_ribbon."/select/option[@value='".Homepage_Common::$_deadline_value."']");
        $I->waitForText(Homepage_Common::$_priority_string, Helper\Acceptance::$wait_medium, 
                Homepage_Common::$_tasks_panel_ribbon."/select/option[@value='".Homepage_Common::$_priority_value."']");
    }
    
    public function FirstTask(AcceptanceTester $I)
    {
        $I->wantTo('FirstTask - s: 29');
        $I->waitForElementVisible(LittleTasks_help::$_first_task_links."/p[contains(text(),'"
                .Homepage_Common::$_little_task_string.LittleTasks_help::$_first_task_SET_training,
                Helper\Acceptance::$wait_medium);
        $I->click(LittleTasks_help::$_first_task_links."/p[contains(text(),'"
                .Homepage_Common::$_little_task_string.LittleTasks_help::$_first_task_SET_training);  
        $I->waitForElementVisible(LittleTasks_help::$_first_task_links.LittleTasks_help::$_first_active_task
                . LittleTasks_help::$_first_task_links2, Helper\Acceptance::$wait_medium);
        $I->click(LittleTasks_help::$_first_task_links.LittleTasks_help::$_first_active_task
                .LittleTasks_help::$_first_task_links2);
        $I->waitForElementVisible(LittleTasks_help::$_first_task_links.LittleTasks_help::$_first_task_plus_icon,
                Helper\Acceptance::$wait_medium);
        $I->click(LittleTasks_help::$_first_task_links.LittleTasks_help::$_first_task_plus_icon);
        $I->waitForText(Homepage_Common::$_sima_string, Helper\Acceptance::$wait_medium, LittleTasks_help::$_add_task_window_header);
    }
}