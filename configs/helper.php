<?php

if (!function_exists('debug')) {
    function debug($data)
    {
        echo '<pre>';
        print_r($data);
        die;
    }
}

if (!function_exists('upload_file')) {
    function upload_file($folder, $file)
    {
        $targetFile = $folder . '/' . time() . '-' . $file["name"];

        if (move_uploaded_file($file["tmp_name"], PATH_ASSETS_UPLOADS . $targetFile)) {
            return $targetFile;
        }

        throw new Exception('Upload file không thành công!');
    }
}

if (!function_exists('is_admin')) {
    function is_admin()
    {
        return isset($_SESSION['user_id']) && $_SESSION['user_role'] === 'admin';
    }
}

if (!function_exists('require_admin')) {
    function require_admin()
    {
        if (!is_admin()) {
            header('Location: ' . BASE_URL);
            exit;
        }
    }
}