<div class="container-fluid py-4">
    <div class="row mb-4">
        <div class="col-md-6">
            <h1 class="h3"><i class="fas fa-users"></i> Quản Lý Người Dùng</h1>
        </div>
        <div class="col-md-6 text-end">
            <a href="<?= BASE_URL_ADMIN ?>/users/create" class="btn btn-success">
                <i class="fas fa-plus"></i> Thêm người dùng
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 5%">ID</th>
                            <th style="width: 20%">Email</th>
                            <th style="width: 20%">Tên</th>
                            <th style="width: 15%">Điện thoại</th>
                            <th style="width: 15%">Role</th>
                            <th style="width: 15%">Ngày đăng ký</th>
                            <th style="width: 20%">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($data['users'])): ?>
                            <?php foreach ($data['users'] as $user): ?>
                                <tr>
                                    <td><strong>#<?= htmlspecialchars((string) $user['id']) ?></strong></td>
                                    <td><?= htmlspecialchars((string) $user['email']) ?></td>
                                    <td><?= htmlspecialchars((string) $user['name']) ?></td>
                                    <td><?= htmlspecialchars((string) $user['phone']) ?></td>
                                    <td>
                                        <?php if ($user['role'] === 'admin'): ?>
                                            <span class="badge bg-danger">Admin</span>
                                        <?php else: ?>
                                            <span class="badge bg-info">Customer</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?= date('d/m/Y H:i', strtotime($user['created_at'])) ?>
                                    </td>
                                    <td>
                                        <a href="<?= BASE_URL_ADMIN ?>/users/edit?id=<?= (int) $user['id'] ?>"
                                            class="btn btn-sm btn-primary">
                                            <i class="fas fa-edit"></i> Sửa
                                        </a>
                                        <?php if ((int) $user['id'] !== (int) ($_SESSION['user_id'] ?? 0)): ?>
                                            <a href="<?= BASE_URL_ADMIN ?>/users/delete?id=<?= (int) $user['id'] ?>"
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirm('Bạn có chắc muốn xóa người dùng này?')">
                                                <i class="fas fa-trash"></i> Xóa
                                            </a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center py-4">
                                    <p class="text-muted">Không có dữ liệu</p>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <!-- Phân trang -->
            <?php if ($data['pagination']['total'] > 1): ?>
                <nav aria-label="Page navigation" class="mt-4">
                    <ul class="pagination justify-content-center">
                        <?php if ($data['pagination']['current'] > 1): ?>
                            <li class="page-item">
                                <a class="page-link" href="<?= BASE_URL_ADMIN ?>/users?page=1">Đầu tiên</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link"
                                    href="<?= BASE_URL_ADMIN ?>/users?page=<?= $data['pagination']['current'] - 1 ?>">Trước</a>
                            </li>
                        <?php endif; ?>

                        <?php
                        $start = max(1, $data['pagination']['current'] - 2);
                        $end = min($data['pagination']['total'], $data['pagination']['current'] + 2);

                        if ($start > 1): ?>
                            <li class="page-item disabled"><span class="page-link">...</span></li>
                        <?php endif; ?>

                        <?php for ($i = $start; $i <= $end; $i++): ?>
                            <li class="page-item <?= ($i === $data['pagination']['current']) ? 'active' : '' ?>">
                                <a class="page-link" href="<?= BASE_URL_ADMIN ?>/users?page=<?= $i ?>">
                                    <?= $i ?>
                                </a>
                            </li>
                        <?php endfor; ?>

                        <?php if ($end < $data['pagination']['total']): ?>
                            <li class="page-item disabled"><span class="page-link">...</span></li>
                        <?php endif; ?>

                        <?php if ($data['pagination']['current'] < $data['pagination']['total']): ?>
                            <li class="page-item">
                                <a class="page-link"
                                    href="<?= BASE_URL_ADMIN ?>/users?page=<?= $data['pagination']['current'] + 1 ?>">Sau</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link"
                                    href="<?= BASE_URL_ADMIN ?>/users?page=<?= $data['pagination']['total'] ?>">Cuối
                                    cùng</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>
            <?php endif; ?>

            <div class="mt-3 text-muted small">
                <p>Tổng cộng: <strong><?= $data['pagination']['total_items'] ?></strong> người dùng
                    (Trang <strong><?= $data['pagination']['current'] ?>/<?= $data['pagination']['total'] ?></strong>)
                </p>
            </div>
        </div>
    </div>
</div>