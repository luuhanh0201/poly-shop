<?php

class ProductControllerClient
{
    private $productModel;
    private $categoryModel;
    private $commentModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
        $this->commentModel = new CommentModel();
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
        $id = (int) $id;
        if ($id <= 0) {
            header('Location: products');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->handleCommentSubmit($id);
        }

        $view = 'product-detail';
        $data = $this->productModel->getById($id);
        $comments = $this->commentModel->getByProductId($id);

        $related = [];
        if (!empty($data['category_id'])) {
            $related = $this->productModel->getProductsByCategory((int) $data['category_id'], 6);
            $related = array_values(array_filter($related, function ($product) use ($id) {
                return (int) ($product['id'] ?? 0) !== $id;
            }));
        }

        $commentMessage = $_SESSION['comment_message'] ?? '';
        $commentError = $_SESSION['comment_error'] ?? '';
        unset($_SESSION['comment_message'], $_SESSION['comment_error']);

        require_once PATH_VIEW_MAIN_CLIENT;
    }

    private function handleCommentSubmit($productId)
    {
        if (!isset($_SESSION['user_id'])) {
            $_SESSION['comment_error'] = 'Vui lòng đăng nhập để bình luận.';
            header('Location: product-detail?id=' . (int) $productId);
            exit;
        }

        $content = trim($_POST['comment_content'] ?? '');
        if ($content === '') {
            $_SESSION['comment_error'] = 'Nội dung bình luận không được để trống.';
            header('Location: product-detail?id=' . (int) $productId);
            exit;
        }

        if (strlen($content) > 1000) {
            $_SESSION['comment_error'] = 'Bình luận tối đa 1000 ký tự.';
            header('Location: product-detail?id=' . (int) $productId);
            exit;
        }

        $created = $this->commentModel->create($productId, (int) $_SESSION['user_id'], $content);
        if ($created) {
            $_SESSION['comment_message'] = 'Gửi bình luận thành công.';
        } else {
            $_SESSION['comment_error'] = 'Không thể gửi bình luận. Vui lòng thử lại.';
        }

        header('Location: product-detail?id=' . (int) $productId);
        exit;
    }

    public function deleteComment()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: login');
            exit;
        }

        $commentId = (int) ($_POST['comment_id'] ?? 0);
        $productId = (int) ($_POST['product_id'] ?? 0);

        if ($commentId <= 0 || $productId <= 0) {
            header('Location: products');
            exit;
        }

        $deleted = $this->commentModel->deleteByIdAndUser($commentId, (int) $_SESSION['user_id']);
        if ($deleted) {
            $_SESSION['comment_message'] = 'Đã xóa bình luận.';
        } else {
            $_SESSION['comment_error'] = 'Không thể xóa bình luận này.';
        }

        header('Location: product-detail?id=' . $productId);
        exit;
    }
}
