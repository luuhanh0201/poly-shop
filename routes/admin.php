<?php

require_once PATH_CONTROLLER_ADMIN . 'CategoryController.php';
require_once PATH_CONTROLLER_ADMIN . 'DashboardController.php';
require_once PATH_CONTROLLER_ADMIN . 'ProductController.php';
require_once PATH_CONTROLLER_ADMIN . 'UserController.php';

$action = $_GET['action'] ?? '/';

match ($action) {
    // '/'         => (new HomeController)->index(),
    '/' => (new \DashboardController)->index(),

    // Users
    'users' => (new \UserController)->index(),
    'users/create' => (new \UserController)->create(),
    'users/edit' => (new \UserController)->edit($_GET['id'] ?? null),
    'users/delete' => (new \UserController)->delete($_GET['id'] ?? null),

    // Categories
    'categories' => (new \CategoryController)->index(),
    'categories/create' => (new \CategoryController)->create(),
    'categories/edit' => (new \CategoryController)->edit($_GET['id'] ?? null),
    'categories/delete' => (new \CategoryController)->delete($_GET['id'] ?? null),

    // Products
    'products' => (new \ProductController)->index(),
    'products/show' => (new \ProductController)->show($_GET['id'] ?? null),
    'products/create' => (new \ProductController)->create(),
    'products/edit' => (new \ProductController)->edit($_GET['id'] ?? null),
    'products/delete' => (new \ProductController)->delete($_GET['id'] ?? null),
    default => (new \DashboardController)->index(),

};