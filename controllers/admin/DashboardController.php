<?php

// require_once PATH_MODEL . 'DashboardModel.php';

class DashboardController
{
    // private $dashboardModel;

    public function __construct()
    {
    }

    public function index()
    {
        $title = 'Dashboard';
        $view = 'dashboard/index';
        require_once PATH_VIEW_MAIN_ADMIN;
    }
}
