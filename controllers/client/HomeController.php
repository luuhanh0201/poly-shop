<?php

class HomeController
{
    private $categoryModel;
    private $productModel;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        $view = 'home';
        $categories = $this->categoryModel->getAll();

        // Lấy sản phẩm mới nhất (6 sản phẩm)
        $latestProducts = $this->productModel->getLatestProducts(6);

        // Lấy sản phẩm theo từng danh mục
        $productsByCategory = [];
        foreach ($categories as $category) {
            $productsByCategory[$category['id']] = [
                'name' => $category['name'],
                'products' => $this->productModel->getProductsByCategory($category['id'], 6)
            ];
        }

        $data = [
            'categories' => $categories,
            'latestProducts' => $latestProducts,
            'productsByCategory' => $productsByCategory
        ];

        require_once PATH_VIEW_MAIN_CLIENT;
    }
}