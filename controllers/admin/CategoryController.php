<?php

require_once PATH_MODEL . 'CategoryModel.php';

class CategoryController
{
    private $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new \CategoryModel();
    }

    public function index()
    {
        $title = 'Quản lý danh mục';
        $view = 'categories/index';
        $data = $this->categoryModel->getAll();
        require_once PATH_VIEW_MAIN_ADMIN;
    }
    public function create()
    {
       if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            if (empty($name)) {
                $error = 'Tên danh mục không được để trống.';
                require_once PATH_VIEW_MAIN_ADMIN;
                return;
            }
            $this->categoryModel->create($name);
            header('Location: ' . BASE_URL_ADMIN . '/categories');
            exit();
        }
        $title = 'Thêm danh mục';
        $view = 'categories/create';
        require_once PATH_VIEW_MAIN_ADMIN;
    } 
    public function edit($id)
    {
        // Lấy thông tin danh mục theo ID
        $category = $this->categoryModel->getById($id);
        if (!$category) {
            header('Location: ' . BASE_URL_ADMIN . '/categories');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            if (empty($name)) {
                $error = 'Tên danh mục không được để trống.';
                require_once PATH_VIEW_MAIN_ADMIN;
                return;
            }
            $this->categoryModel->update($id, $name);
            header('Location: ' . BASE_URL_ADMIN . '/categories');
            exit();
        }

        $title = 'Sửa danh mục';
        $view = 'categories/edit';
        require_once PATH_VIEW_MAIN_ADMIN;
    }
        public function delete($id)
        {
            $this->categoryModel->delete($id);
            header('Location: ' . BASE_URL_ADMIN . '/categories');
            exit();
        }
}
