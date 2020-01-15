<?php

include_once dirname(dirname(__FILE__)) . '/Homepage_Common.php';

class TabLineCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->loginAsAdminUser($I);
    }

    public function _after(AcceptanceTester $I)
    {
    }

    public function CheckTabLine(AcceptanceTester $I)
    {
        $I->wantTo('CheckTabLine - s: 10');
        $I->waitForElementVisible(Homepage_Common::$_tab_drop_menue, Helper\Acceptance::$wait_medium);
        $I->waitForElementVisible(Homepage_Common::$_tab_line."/li[@class='ui-sortable-handle sima-ui-active']", 
                Helper\Acceptance::$wait_medium);
    }
}