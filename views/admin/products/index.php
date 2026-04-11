<div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        <h2 class="h5 mb-1">Danh sách sản phẩm</h2>
        <p class="text-muted mb-0">Tổng cộng: <?= htmlspecialchars((string) ($pagination['totalItems'] ?? 0)) ?> sản
            phẩm
        </p>
    </div>
    <a href="<?= BASE_URL_ADMIN ?>/products/create" class="btn btn-sm btn-success">+ Thêm sản phẩm</a>
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
                <th>Số lượng</th>
                <th style="width: 200px;">Mô tả</th>
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
                        <td><?= htmlspecialchars((string) ($item['quantity'] ?? 0)) ?></td>
                        <td
                            style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; word-break: break-word; height: 96.8px;">
                            <?= htmlspecialchars((string) ($item['description'] ?? '')) ?>
                        </td>
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

<!-- Pagination -->
<?php if (($pagination['totalPages'] ?? 0) > 1): ?>
    <nav aria-label="Page navigation" class="mt-4">
        <ul class="pagination justify-content-center">
            <!-- Previous Button -->
            <?php if ($pagination['currentPage'] > 1): ?>
                <li class="page-item">
                    <a class="page-link"
                        href="<?= BASE_URL_ADMIN ?>/products?page=<?= $pagination['currentPage'] - 1 ?>">Trước</a>
                </li>
            <?php else: ?>
                <li class="page-item disabled">
                    <span class="page-link">Trước</span>
                </li>
            <?php endif; ?>

            <!-- Page Numbers -->
            <?php
            $startPage = max(1, $pagination['currentPage'] - 2);
            $endPage = min($pagination['totalPages'], $pagination['currentPage'] + 2);

            if ($startPage > 1): ?>
                <li class="page-item">
                    <a class="page-link" href="<?= BASE_URL_ADMIN ?>/products?page=1">1</a>
                </li>
                <?php if ($startPage > 2): ?>
                    <li class="page-item disabled">
                        <span class="page-link">...</span>
                    </li>
                <?php endif; ?>
            <?php endif; ?>

            <?php for ($page = $startPage; $page <= $endPage; $page++): ?>
                <?php if ($page === $pagination['currentPage']): ?>
                    <li class="page-item active" aria-current="page">
                        <span class="page-link">
                            <?= $page ?>
                        </span>
                    </li>
                <?php else: ?>
                    <li class="page-item">
                        <a class="page-link" href="<?= BASE_URL_ADMIN ?>/products?page=<?= $page ?>">
                            <?= $page ?>
                        </a>
                    </li>
                <?php endif; ?>
            <?php endfor; ?>

            <?php if ($endPage < $pagination['totalPages']): ?>
                <?php if ($endPage < $pagination['totalPages'] - 1): ?>
                    <li class="page-item disabled">
                        <span class="page-link">...</span>
                    </li>
                <?php endif; ?>
                <li class="page-item">
                    <a class="page-link" href="<?= BASE_URL_ADMIN ?>/products?page=<?= $pagination['totalPages'] ?>">
                        <?= $pagination['totalPages'] ?>
                    </a>
                </li>
            <?php endif; ?>

            <!-- Next Button -->
            <?php if ($pagination['currentPage'] < $pagination['totalPages']): ?>
                <li class="page-item">
                    <a class="page-link"
                        href="<?= BASE_URL_ADMIN ?>/products?page=<?= $pagination['currentPage'] + 1 ?>">Tiếp</a>
                </li>
            <?php else: ?>
                <li class="page-item disabled">
                    <span class="page-link">Tiếp</span>
                </li>
            <?php endif; ?>
        </ul>
    </nav>

    <!-- Pagination Info -->
    <div class="text-center text-muted mt-2">
        <small>Trang
            <?= $pagination['currentPage'] ?> trong
            <?= $pagination['totalPages'] ?> (
            <?= htmlspecialchars((string) ($pagination['itemsPerPage'] ?? 10)) ?> sản phẩm mỗi trang)
        </small>
    </div>
<?php endif; ?>