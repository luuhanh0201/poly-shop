<?php

class ProductControllerClient
{
    private $productModel;
    private $categoryModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
    }

    public function index()
    {
        $view = 'products';

        // Lọc và tìm kiếm
        $search = $_GET['search'] ?? '';
        $category_id = $_GET['category'] ?? '';
        $page = (int) ($_GET['page'] ?? 1);
        $limit = 12;
        $offset = ($page - 1) * $limit;

        // Lấy dữ liệu sản phẩm
        $data = $this->productModel->search($search, $category_id, $limit, $offset);

        // Lấy tổng số bản ghi
        $total = $this->productModel->searchTotal($search, $category_id);

        // Lấy danh sách danh mục
        $categories = $this->categoryModel->getAll();

        // Tính toán pagination
        $totalPages = ceil($total / $limit);

        require_once PATH_VIEW_MAIN_CLIENT;
    }

    public function show($id)
    {
        $view = 'product-detail';
        $data = $this->productModel->getById($id);

        require_once PATH_VIEW_MAIN_CLIENT;
    }
}
