<?php

require_once PATH_MODEL . 'UserModel.php';

class UserController
{
    private $userModel;
    private $limit = 10;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $title = 'Quản lý người dùng';
        $view = 'users/index';

        $page = $_GET['page'] ?? 1;
        $page = max(1, (int) $page);
        $offset = ($page - 1) * $this->limit;

        $users = $this->userModel->getAll($this->limit, $offset);
        $total = $this->userModel->getTotal();
        $totalPages = ceil($total / $this->limit);

        $pagination = [
            'current' => $page,
            'total' => $totalPages,
            'limit' => $this->limit,
            'offset' => $offset,
            'total_items' => $total
        ];

        $data = [
            'users' => $users,
            'pagination' => $pagination
        ];

        require_once PATH_VIEW_MAIN_ADMIN;
    }

    public function create()
    {
        $title = 'Thêm người dùng';
        $view = 'users/create';
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $phone = trim($_POST['phone'] ?? '');
            $password = $_POST['password'] ?? '';
            $role = $_POST['role'] ?? 'customer';

            if ($name === '' || $email === '' || $phone === '' || $password === '') {
                $error = 'Vui lòng nhập đầy đủ thông tin';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = 'Email không hợp lệ';
            } elseif (strlen($password) < 6) {
                $error = 'Mật khẩu tối thiểu 6 ký tự';
            } elseif (!in_array($role, ['admin', 'customer'], true)) {
                $error = 'Vai trò không hợp lệ';
            } elseif ($this->userModel->findByEmail($email)) {
                $error = 'Email này đã tồn tại';
            } else {
                $created = $this->userModel->createByAdmin([
                    'name' => $name,
                    'email' => $email,
                    'phone' => $phone,
                    'password' => $password,
                    'role' => $role,
                ]);

                if ($created) {
                    header('Location: ' . BASE_URL_ADMIN . '/users');
                    exit;
                }

                $error = 'Có lỗi xảy ra khi tạo người dùng';
            }
        }

        $data = [
            'error' => $error,
            'form_data' => $_POST,
        ];

        require_once PATH_VIEW_MAIN_ADMIN;
    }

    public function edit($id)
    {
        $id = (int) $id;
        $user = $this->userModel->findById($id);
        if (!$user) {
            header('Location: ' . BASE_URL_ADMIN . '/users');
            exit;
        }

        $error = '';
        $success = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name'] ?? '');
            $phone = trim($_POST['phone'] ?? '');
            $role = $_POST['role'] ?? 'customer';

            if (empty($name)) {
                $error = 'Tên không được để trống';
            } elseif (empty($phone)) {
                $error = 'Số điện thoại không được để trống';
            } elseif (!in_array($role, ['admin', 'customer'], true)) {
                $error = 'Vai trò không hợp lệ';
            } else {
                // Kiểm tra không được tự hạ role của bản thân
                if ($id == $_SESSION['user_id'] && $role !== $user['role'] && $role !== 'admin') {
                    $error = 'Bạn không thể tự hạ role của mình!';
                } else {
                    if (
                        $this->userModel->updateWithRole($id, [
                            'name' => $name,
                            'phone' => $phone,
                            'role' => $role
                        ])
                    ) {
                        $success = 'Cập nhật thành công!';
                        $user = $this->userModel->findById($id);
                    } else {
                        $error = 'Có lỗi xảy ra';
                    }
                }
            }
        }

        $title = 'Cập nhật người dùng';
        $view = 'users/edit';

        $data = [
            'user' => $user,
            'error' => $error,
            'success' => $success
        ];

        require_once PATH_VIEW_MAIN_ADMIN;
    }

    public function delete($id)
    {
        $id = (int) $id;
        if ($id <= 0) {
            header('Location: ' . BASE_URL_ADMIN . '/users');
            exit;
        }

        if ($id === (int) ($_SESSION['user_id'] ?? 0)) {
            header('Location: ' . BASE_URL_ADMIN . '/users');
            exit;
        }

        $user = $this->userModel->findById($id);
        if (!$user) {
            header('Location: ' . BASE_URL_ADMIN . '/users');
            exit;
        }

        $this->userModel->deleteById($id);
        header('Location: ' . BASE_URL_ADMIN . '/users');
        exit;
    }
}
