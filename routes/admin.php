<?php

require_once PATH_CONTROLLER_ADMIN . 'CategoryController.php';
require_once PATH_CONTROLLER_ADMIN . 'DashboardController.php';

$action = $_GET['action'] ?? '/';

match ($action) {
    // '/'         => (new HomeController)->index(),
    '/' => (new \DashboardController)->index(),


    // Categories
    'categories' => (new \CategoryController)->index(),
    'categories/create' => (new \CategoryController)->create(),
    'categories/edit' => (new \CategoryController)->edit($_GET['id'] ?? null),
    'categories/delete' => (new \CategoryController)->delete($_GET['id'] ?? null),
    
};