<div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        <h2 class="h5 mb-1">Danh sách danh mục</h2>
        <p class="text-muted mb-0">Tổng cộng: <?= count($data ?? []) ?> danh mục</p>
    </div>
    <a href="<?= BASE_URL_ADMIN ?>/categories/create" class="btn btn-sm btn-success">+ Thêm danh mục</a>
</div>

<div class="table-responsive">
    <table class="table table-bordered table-hover align-middle mb-0">
        <thead class="table-light">
            <tr>
                <th style="width: 90px;">ID</th>
                <th>Tên danh mục</th>
                <th style="width: 200px;">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($data)): ?>
                <?php foreach ($data as $item): ?>
                    <tr>
                        <td><?= htmlspecialchars((string) ($item['id'] ?? '')) ?></td>
                        <td><?= htmlspecialchars((string) ($item['name'] ?? '')) ?></td>
                        <td>
                            <a href="<?= BASE_URL_ADMIN ?>/categories/edit/?id=<?= htmlspecialchars((string) ($item['id'] ?? '')) ?>" class="btn btn-sm btn-outline-primary">Sửa</a>
                            <a onclick="return confirm('Bạn có muốn xoá danh mục này không?')" href="<?= BASE_URL_ADMIN ?>/categories/delete/?id=<?= htmlspecialchars((string) ($item['id'] ?? '')) ?>" class="btn btn-sm btn-outline-danger">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3" class="text-center text-muted py-4">Chưa có danh mục nào.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>