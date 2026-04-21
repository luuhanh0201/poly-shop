<?php

class AuthController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function register()
    {
        $view = 'auth/register';
        $message = '';
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $phone = trim($_POST['phone'] ?? '');
            $password = $_POST['password'] ?? '';
            $confirm_password = $_POST['confirm_password'] ?? '';

            // Validate
            if (empty($name)) {
                $error = 'Vui lòng nhập họ tên';
            } elseif (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = 'Vui lòng nhập email hợp lệ';
            } elseif (empty($phone)) {
                $error = 'Vui lòng nhập số điện thoại';
            } elseif (empty($password) || strlen($password) < 6) {
                $error = 'Mật khẩu phải có ít nhất 6 ký tự';
            } elseif ($password !== $confirm_password) {
                $error = 'Mật khẩu xác nhận không khớp';
            } elseif ($this->userModel->findByEmail($email)) {
                $error = 'Email này đã được đăng ký';
            } else {
                if (
                    $this->userModel->create([
                        'name' => $name,
                        'email' => $email,
                        'phone' => $phone,
                        'password' => $password
                    ])
                ) {
                    $message = 'Đăng ký thành công! Vui lòng <a href="' . BASE_URL . '/login" style="color: var(--accent);">đăng nhập</a>';
                } else {
                    $error = 'Có lỗi xảy ra. Vui lòng thử lại.';
                }
            }
        }

        $data = [
            'message' => $message,
            'error' => $error,
            'form_data' => $_POST
        ];

        require_once PATH_VIEW_MAIN_CLIENT;
    }

    public function login()
    {
        $view = 'auth/login';
        $message = '';
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';

            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = 'Vui lòng nhập email hợp lệ';
            } elseif (empty($password)) {
                $error = 'Vui lòng nhập mật khẩu';
            } else {
                $user = $this->userModel->findByEmail($email);
                if ($user && password_verify($password, $user['password'])) {
                    // Đăng nhập thành công
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_email'] = $user['email'];
                    $_SESSION['user_name'] = $user['name'];
                    $_SESSION['user_role'] = $user['role'] ?? 'customer';

                    // Redirect to home
                    header('Location: ' . BASE_URL);
                    exit;
                } else {
                    $error = 'Email hoặc mật khẩu không chính xác';
                }
            }
        }

        $data = [
            'message' => $message,
            'error' => $error,
            'form_data' => $_POST
        ];

        require_once PATH_VIEW_MAIN_CLIENT;
    }

    public function logout()
    {
        session_destroy();
        header('Location: ' . BASE_URL);
        exit;
    }

    public function profile()
    {
        // Check if user is logged in
        if (!isset($_SESSION['user_id'])) {
            header('Location: ' . BASE_URL . '/login');
            exit;
        }

        $view = 'auth/profile';
        $user = $this->userModel->findById($_SESSION['user_id']);
        $message = '';
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name'] ?? '');
            $phone = trim($_POST['phone'] ?? '');

            if (empty($name)) {
                $error = 'Vui lòng nhập họ tên';
            } elseif (empty($phone)) {
                $error = 'Vui lòng nhập số điện thoại';
            } else {
                if (
                    $this->userModel->update($_SESSION['user_id'], [
                        'name' => $name,
                        'phone' => $phone
                    ])
                ) {
                    $_SESSION['user_name'] = $name;
                    $user = $this->userModel->findById($_SESSION['user_id']);
                    $message = 'Cập nhật thông tin thành công!';
                } else {
                    $error = 'Có lỗi xảy ra. Vui lòng thử lại.';
                }
            }
        }

        $data = [
            'user' => $user,
            'message' => $message,
            'error' => $error,
            'form_data' => $_POST
        ];

        require_once PATH_VIEW_MAIN_CLIENT;
    }
}
