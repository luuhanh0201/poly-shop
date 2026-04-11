<?php
$product = $product ?? $data ?? null;
?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        <h2 class="h5 mb-1">Chi tiết sản phẩm</h2>
        <p class="text-muted mb-0">Thông tin đầy đủ của sản phẩm đã chọn.</p>
    </div>
    <a href="<?= BASE_URL_ADMIN ?>/products" class="btn btn-sm btn-outline-secondary">Quay lại</a>
</div>

<?php if (empty($product)): ?>
    <div class="alert alert-warning mb-0" role="alert">
        Không tìm thấy sản phẩm.
    </div>
<?php else: ?>
    <div class="row g-3">
        <div class="col-12 col-lg-4">
            <div class="border rounded p-3 bg-light h-100 d-flex align-items-center justify-content-center">
                <?php if (!empty($product['image'])): ?>
                    <img src="<?= BASE_URL . '/uploads/' . htmlspecialchars((string) $product['image']) ?>" alt="Ảnh sản phẩm"
                        class="img-fluid rounded" style="max-height: 320px; object-fit: cover;">
                <?php else: ?>
                    <span class="text-muted">Sản phẩm chưa có hình ảnh</span>
                <?php endif; ?>
            </div>
        </div>

        <div class="col-12 col-lg-8">
            <div class="border rounded p-3 h-100">
                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label text-muted mb-1">Tên sản phẩm</label>
                        <div class="fw-semibold">
                            <?= htmlspecialchars((string) ($product['name'] ?? '')) ?>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <label class="form-label text-muted mb-1">Mã sản phẩm</label>
                        <div>#
                            <?= htmlspecialchars((string) ($product['id'] ?? '')) ?>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <label class="form-label text-muted mb-1">Danh mục</label>
                        <div>
                            <?= htmlspecialchars((string) ($product['category_name'] ?? 'Chưa phân loại')) ?>
                        </div>
                    </div>

                    <div class="col-12">
                        <label class="form-label text-muted mb-1">Giá bán</label>
                        <div class="text-success fw-bold fs-5">
                            <?= number_format((float) ($product['price'] ?? 0), 0, ',', '.') ?> đ
                        </div>
                    </div>
                    <div class="col-12">
                        <label class="form-label text-muted mb-1">Số lượng</label>
                        <div>
                            <?= htmlspecialchars((string) ($product['quantity'] ?? 0)) ?>
                        </div>
                    </div>

                    <div class="col-12">
                        <label class="form-label text-muted mb-1">Mô tả</label>
                        <div class="border rounded p-3 bg-light-subtle" style="white-space: pre-wrap;">
                            <?= htmlspecialchars((string) ($product['description'] ?? 'Chưa có mô tả.')) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-3 d-flex gap-2">
        <a href="<?= BASE_URL_ADMIN ?>/products" class="btn btn-outline-secondary">Danh sách sản phẩm</a>
        <a href="<?= BASE_URL_ADMIN ?>/product/edit/?id=<?= htmlspecialchars((string) ($product['id'] ?? '')) ?>"
            class="btn btn-primary">Chỉnh sửa</a>
    </div>
<?php endif; ?>