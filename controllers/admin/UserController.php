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

        $data = $this->userModel->getAll($this->limit, $offset);
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
            'users' => $data,
            'pagination' => $pagination
        ];

        require_once PATH_VIEW_MAIN_ADMIN;
    }

    public function edit($id)
    {
        $user = $this->userModel->findById($id);
        if (!$user) {
            header('Location: ' . BASE_URL_ADMIN . 'users');
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
}
