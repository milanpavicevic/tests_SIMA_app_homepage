<?php

class BigTaskCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->loginAsAdminUser($I);
    }

    public function _after(AcceptanceTester $I)
    {
    }
    
    public function BigTaskPriorityDropMenu(AcceptanceTester $I)
    {
        $I->wantTo('BigTaskPriorityDropMenu - s: 29');
        $I->waitForElementVisible(Homepage_Common::$_working_task_panel."/select", Helper\Acceptance::$wait_medium);
        $I->click(Homepage_Common::$_working_task_panel."/select");
        $I->waitForText(Homepage_Common::$_days_left_string, Helper\Acceptance::$wait_medium,
                Homepage_Common::$_tasks_panel_ribbon."/select/option[@value='".Homepage_Common::$_days_left_value."']");
        $I->waitForText(Homepage_Common::$_deadline_string, Helper\Acceptance::$wait_medium,
                Homepage_Common::$_tasks_panel_ribbon."/select/option[@value='".Homepage_Common::$_deadline_value."']");
        $I->waitForText(Homepage_Common::$_priority_string, Helper\Acceptance::$wait_medium, 
                Homepage_Common::$_tasks_panel_ribbon."/select/option[@value='".Homepage_Common::$_priority_value."']");
    }
    
}