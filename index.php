<?php

session_start();

spl_autoload_register(function ($class) {
    $fileName = "$class.php";

    $fileModel = PATH_MODEL . $fileName;
    $fileControllerClient = PATH_CONTROLLER_CLIENT . $fileName;
    $fileControllerAdmin = PATH_CONTROLLER_ADMIN . $fileName;

    if (is_readable($fileModel)) {
        require_once $fileModel;
    } else if (is_readable($fileControllerClient)) {
        require_once $fileControllerClient;
    } else if (is_readable($fileControllerAdmin)) {
        require_once $fileControllerAdmin;
    }
});

require_once './configs/env.php';
require_once './configs/helper.php';

// Điều hướng: hỗ trợ cả query (?mode, ?action) và đường dẫn đẹp (/admin, /admin/products)
$mode = $_GET['mode'] ?? 'client';
$action = $_GET['action'] ?? '/';

$requestPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? '/';
$requestPath = trim($requestPath, '/');

$scriptDir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? ''));
$scriptDir = trim($scriptDir, '/');

if ($scriptDir !== '' && strpos($requestPath, $scriptDir) === 0) {
    $requestPath = trim(substr($requestPath, strlen($scriptDir)), '/');
}

$segments = $requestPath === '' ? [] : explode('/', $requestPath);

if (!isset($_GET['mode'])) {
    if (isset($segments[0]) && $segments[0] === 'admin') {
        $mode = 'admin';
        $action = isset($segments[1]) ? implode('/', array_slice($segments, 1)) : '/';
    } else {
        $mode = 'client';
        $action = !empty($segments) ? implode('/', $segments) : '/';
    }
}

$_GET['mode'] = $mode;
$_GET['action'] = $action;

if ($mode == 'admin') {
    // Kiểm tra đăng nhập tài khoản có quyền admin hay không
    if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
        // Không có quyền admin, đẩy sang router của client
        header('Location: ' . BASE_URL);
        exit;
    }
    // Nếu có quyền admin đẩy sang router của admin
    require_once './routes/admin.php';
} else {
    // Require đường dẫn của client
    require_once './routes/client.php';
}