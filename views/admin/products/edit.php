<div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        <h2 class="h5 mb-1">Sửa sản phẩm</h2>
        <p class="text-muted mb-0">Cập nhật thông tin sản phẩm.</p>
    </div>
    <a href="<?= BASE_URL_ADMIN ?>/products" class="btn btn-sm btn-outline-secondary">Quay lại</a>
</div>

<?php if (!empty($error)): ?>
    <div class="alert alert-danger" role="alert">
        <?= htmlspecialchars((string) $error) ?>
    </div>
<?php endif; ?>

<form method="post"
    action="<?= BASE_URL_ADMIN ?>/products/edit?id=<?= htmlspecialchars((string) ($product['id'] ?? '')) ?>"
    class="row g-3" enctype="multipart/form-data">
    <div class="col-12">
        <label for="name" class="form-label">Tên sản phẩm</label>
        <input type="text" id="name" name="name" class="form-control" placeholder="Ví dụ: Vợt cầu lông"
            value="<?= htmlspecialchars((string) ($_POST['name'] ?? $product['name'] ?? '')) ?>" required>
    </div>
    <div class="col-12">
        <label for="category_id" class="form-label">Danh mục</label>
        <select id="category_id" name="category_id" class="form-select" required>
            <option value="">-- Chọn danh mục --</option>
            <?php if (!empty($categories)): ?>
                <?php foreach ($categories as $cat): ?>
                    <option value="<?= htmlspecialchars((string) ($cat['id'] ?? '')) ?>" <?= (isset($_POST['category_id']) && $_POST['category_id'] == $cat['id']) ? 'selected' : (($product['category_id'] ?? '') == $cat['id'] ? 'selected' : '') ?>>
                        <?= htmlspecialchars((string) ($cat['name'] ?? '')) ?>
                    </option>
                <?php endforeach; ?>
            <?php endif; ?>
        </select>
    </div>
    <div class="col-12">
        <label for="price" class="form-label">Giá</label>
        <input type="number" id="price" name="price" class="form-control" placeholder="Ví dụ: 500000"
            value="<?= htmlspecialchars((string) ($_POST['price'] ?? $product['price'] ?? '')) ?>" required>
    </div>
    <div class="col-12">
        <label for="quantity" class="form-label">Số lượng</label>
        <input type="number" id="quantity" name="quantity" class="form-control" placeholder="Ví dụ: 100"
            value="<?= htmlspecialchars((string) ($_POST['quantity'] ?? $product['quantity'] ?? '')) ?>" required>
        <div class="col-12">
            <label for="description" class="form-label">Mô tả</label>
            <textarea id="description" name="description" class="form-control" rows="4"
                placeholder="Mô tả sản phẩm..."><?= htmlspecialchars((string) ($_POST['description'] ?? $product['description'] ?? '')) ?></textarea>
        </div>
        <div class="col-12">
            <label for="image" class="form-label">Hình ảnh</label>
            <input type="file" id="image" name="image" class="form-control">
        </div>

        <div class="col-12 d-flex gap-2">
            <button type="submit" class="btn btn-success">Lưu sản phẩm</button>
            <a href="<?= BASE_URL_ADMIN ?>/products" class="btn btn-outline-secondary">Hủy</a>
        </div>
</form>