<div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        <h2 class="h5 mb-1">Sửa danh mục</h2>
        <p class="text-muted mb-0">Cập nhật thông tin danh mục hiện tại.</p>
    </div>
    <a href="<?= BASE_URL_ADMIN ?>/categories" class="btn btn-sm btn-outline-secondary">Quay lại</a>
</div>

<?php if (!empty($error)): ?>
    <div class="alert alert-danger" role="alert">
        <?= htmlspecialchars((string) $error) ?>
    </div>
<?php endif; ?>

<form method="post"
    action="<?= BASE_URL ?>?mode=admin&action=categories/edit&id=<?= urlencode((string) ($category['id'] ?? '')) ?>"
    class="row g-3">
    <div class="col-12">
        <label for="name" class="form-label">Tên danh mục</label>
        <input type="text" id="name" name="name" class="form-control" placeholder="Ví dụ: Vợt cầu lông"
            value="<?= htmlspecialchars((string) ($_POST['name'] ?? ($category['name'] ?? ''))) ?>" required>
    </div>

    <div class="col-12 d-flex gap-2">
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="<?= BASE_URL_ADMIN ?>/categories" class="btn btn-outline-secondary">Hủy</a>
    </div>
</form>