<?php

$action = $_GET['action'] ?? '/';
$id = $_GET['id'] ?? null;

match ($action) {
    '/' => (new HomeController)->index(),
    'products' => (new ProductControllerClient)->index(),
    'product-detail' => $id ? (new ProductControllerClient)->show($id) : header('Location: products'),
    'register' => (new AuthController)->register(),
    'login' => (new AuthController)->login(),
    'logout' => (new AuthController)->logout(),
    'profile' => (new AuthController)->profile(),
};