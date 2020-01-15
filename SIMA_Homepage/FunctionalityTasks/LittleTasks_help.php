<?php

class LittleTasks_help 
{
    public static $_first_task_links = "//div[contains(concat(' ' ,@class, ' '), 'feature_tasks')]"
                . "/div[@class='sima-layout-panel _horizontal _has_layout_children']"
                . "/div[contains(concat(' ' ,@class, ' '), 'active_tasks_task_list')]"
                . "/div[1]";
    public static $_first_task_plus_icon = "/div[@class='day_report']/span[@class='sima-icon _add _16']";
    public static $_first_task_SET_training = "')]/span/span[contains(text(),'Obuka u SET Šapcu - Fabrika betona')]";
    public static $_first_active_task = "/div[@class='sima-ui-feature-active_task-path']";
    public static $_first_task_links2 = "/span[@class='data path']/span/span[contains(text(),'Obuka u SET Šapcu - Fabrika betona')]";
    public static $_add_task_window_header = "//div[contains(concat(' ' ,@class, ' '), 'ui-dialog ui-widget ui-widget-content')]"
                . "/div[contains(concat(' ' ,@class, ' '), 'ui-widget-header')]";
}