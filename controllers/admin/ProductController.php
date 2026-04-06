<?php
class ProductController
{
    private $productModel;
    public function __construct()
    {
        $this->productModel = new \ProductModel();
    }
    public function index()
    {
        $data = $this->productModel->getAll();
        $title = 'Quản lý sản phẩm';
        $view = 'products/index';
        require_once PATH_VIEW_MAIN_ADMIN;

    }
    public function getById($id)
    {
        return $this->productModel->getById($id);
    }
    public function show($id)
    {
        if (empty($id)) {
            header('Location: ' . BASE_URL_ADMIN . '/products');
            exit();
        }

        $product = $this->productModel->getById($id);
        $title = 'Chi tiết sản phẩm';
        $view = 'products/show';
        require_once PATH_VIEW_MAIN_ADMIN;
    }
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $price = $_POST['price'] ?? '';
            $category_id = $_POST['category_id'] ?? '';
            $description = $_POST['description'] ?? '';

            // Xử lý upload hình ảnh
            $image = null;
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = __DIR__ . '/../../uploads/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }
                $filename = uniqid() . '_' . basename($_FILES['image']['name']);
                $targetFile = $uploadDir . $filename;
                if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                    $image = $filename;
                }
            }

            if (empty($name) || empty($price) || empty($category_id)) {
                $error = 'Vui lòng điền đầy đủ thông tin.';
                require_once PATH_VIEW_MAIN_ADMIN;
                return;
            }

            $this->productModel->create([
                'name' => $name,
                'price' => $price,
                'category_id' => $category_id,
                'description' => $description,
                'image' => $image
            ]);

            header('Location: ' . BASE_URL_ADMIN . '/products');
            exit();
        }

        require_once PATH_MODEL . 'CategoryModel.php';
        $categoryModel = new \CategoryModel();
        $categories = $categoryModel->getAll();

        $title = 'Thêm sản phẩm';
        $view = 'products/create';
        require_once PATH_VIEW_MAIN_ADMIN;
    }

    public function edit($id)
    {
        // Lấy thông tin sản phẩm theo ID
        $product = $this->productModel->getById($id);
        if (!$product) {
            header('Location: ' . BASE_URL_ADMIN . '/products');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $price = $_POST['price'] ?? '';
            $category_id = $_POST['category_id'] ?? '';
            $description = $_POST['description'] ?? '';

            // Xử lý upload hình ảnh
            $image = $product['image']; // Giữ nguyên hình cũ nếu không có hình mới
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = __DIR__ . '/../../uploads/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }
                $filename = uniqid() . '_' . basename($_FILES['image']['name']);
                $targetFile = $uploadDir . $filename;
                if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                    $image = $filename;
                }
            }

            if (empty($name) || empty($price) || empty($category_id)) {
                $error = 'Vui lòng điền đầy đủ thông tin.';
                require_once PATH_VIEW_MAIN_ADMIN;
                return;
            }

            $this->productModel->update($id, [
                'name' => $name,
                'price' => $price,
                'category_id' => $category_id,
                'description' => $description,
                'image' => $image
            ]);

            header('Location: ' . BASE_URL_ADMIN . '/products');
            exit();
        }

        require_once PATH_MODEL . 'CategoryModel.php';
        $categoryModel = new \CategoryModel();
        $categories = $categoryModel->getAll();

        $title = 'Sửa sản phẩm';
        $view = 'products/edit';
        require_once PATH_VIEW_MAIN_ADMIN;
    }
    public function delete($id)
    {
        if (empty($id)) {
            header('Location: ' . BASE_URL_ADMIN . '/products');
            exit();
        }
        $this->productModel->delete($id);
        header('Location: ' . BASE_URL_ADMIN . '/products');
        exit();
    }
}