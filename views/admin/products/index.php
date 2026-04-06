<div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        <h2 class="h5 mb-1">Danh sách danh mục</h2>
        <p class="text-muted mb-0">Tổng cộng: <?= count($data ?? []) ?> danh mục</p>
    </div>
    <a href="<?= BASE_URL_ADMIN ?>/products/create" class="btn btn-sm btn-success">+ Thêm danh mục</a>
</div>

<div class="table-responsive">
    <table class="table table-bordered table-hover align-middle mb-0">
        <thead class="table-light">
            <tr>
                <th style="width: 90px;">ID</th>
                <th>Tên sản phẩm</th>
                <th>Danh mục</th>
                <th>Hình ảnh</th>
                <th>Giá</th>
                <th>Mô tả</th>
                <th style="width: 200px;">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($data)): ?>
                <?php foreach ($data as $item): ?>
                    <tr>
                        <td><?= htmlspecialchars((string) ($item['id'] ?? '')) ?></td>
                        <td><?= htmlspecialchars((string) ($item['name'] ?? '')) ?></td>
                        <td><?= htmlspecialchars((string) ($item['category_name'] ?? '')) ?></td>
                        <td>
                            <?php if (!empty($item['image'])): ?>
                                <img src="<?= BASE_URL . '/uploads/' . htmlspecialchars((string) ($item['image'] ?? '')) ?>"
                                    alt="Hình ảnh sản phẩm" style="max-width: 80px; max-height: 80px; object-fit: cover;">
                            <?php else: ?>
                                <span class="text-muted">Chưa có hình</span>
                            <?php endif; ?>
                        </td>
                        <td><?= htmlspecialchars((string) ($item['price'] ?? '')) ?></td>
                        <td><?= htmlspecialchars((string) ($item['description'] ?? '')) ?></td>
                        <td>
                            <a href="<?= BASE_URL_ADMIN ?>/products/show?id=<?= htmlspecialchars((string) ($item['id'] ?? '')) ?>"
                                class="btn btn-sm btn-outline-secondary">Xem</a>
                            <a href="<?= BASE_URL_ADMIN ?>/products/edit?id=<?= htmlspecialchars((string) ($item['id'] ?? '')) ?>"
                                class="btn btn-sm btn-outline-primary">Sửa</a>
                            <a onclick="return confirm('Bạn có muốn xoá sản phẩm này không?')"
                                href="<?= BASE_URL_ADMIN ?>/products/delete?id=<?= htmlspecialchars((string) ($item['id'] ?? '')) ?>"
                                class="btn btn-sm btn-outline-danger">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" class="text-center text-muted py-4">Chưa có sản phẩm nào.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>