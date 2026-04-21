<div class="container-fluid py-4">
    <div class="row mb-4">
        <div class="col-md-6">
            <h1 class="h3"><i class="fas fa-edit"></i> Cập Nhật Người Dùng</h1>
        </div>
        <div class="col-md-6 text-end">
            <a href="<?= BASE_URL_ADMIN ?>/users" class="btn btn-secondary"><i class="fas fa-arrow-left"></i>
                Quay lại</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <?php if (!empty($data['success'])): ?>
                        <div class="alert alert-success alert-dismissible fade show">
                            <i class="fas fa-check"></i> <?= htmlspecialchars((string) $data['success']) ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($data['error'])): ?>
                        <div class="alert alert-danger alert-dismissible fade show">
                            <i class="fas fa-exclamation-circle"></i> <?= htmlspecialchars((string) $data['error']) ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="">
                        <div class="mb-3">
                            <label class="form-label"><i class="fas fa-envelope"></i> Email</label>
                            <input type="email" class="form-control"
                                value="<?= htmlspecialchars((string) $data['user']['email']) ?>" disabled>
                            <small class="text-muted">Email không thể sửa</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><i class="fas fa-user"></i> Họ Và Tên *</label>
                            <input type="text" class="form-control" name="name"
                                value="<?= htmlspecialchars((string) $data['user']['name']) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><i class="fas fa-phone"></i> Số Điện Thoại *</label>
                            <input type="tel" class="form-control" name="phone"
                                value="<?= htmlspecialchars((string) $data['user']['phone']) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><i class="fas fa-cog"></i> Role *</label>
                            <select class="form-select" name="role" required>
                                <option value="customer" <?= $data['user']['role'] === 'customer' ? 'selected' : '' ?>>
                                    Customer (Người dùng)
                                </option>
                                <option value="admin" <?= $data['user']['role'] === 'admin' ? 'selected' : '' ?>>
                                    Admin (Quản trị viên)
                                </option>
                            </select>
                            <?php if ($data['user']['id'] == $_SESSION['user_id']): ?>
                                <small class="text-warning"><i class="fas fa-exclamation-triangle"></i> Lưu ý: Bạn không thể
                                    tự hạ role của mình!</small>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><i class="fas fa-calendar-alt"></i> Ngày Đăng Ký</label>
                            <input type="text" class="form-control"
                                value="<?= date('d/m/Y H:i', strtotime($data['user']['created_at'])) ?>" disabled>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-save"></i> Cập Nhật
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card bg-light">
                <div class="card-body">
                    <h5 class="card-title">ℹ️ Thông Tin</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <strong>ID:</strong> #<?= $data['user']['id'] ?>
                        </li>
                        <li class="mb-2">
                            <strong>Email:</strong><br>
                            <?= htmlspecialchars((string) $data['user']['email']) ?>
                        </li>
                        <li class="mb-2">
                            <strong>Role hiện tại:</strong><br>
                            <?php if ($data['user']['role'] === 'admin'): ?>
                                <span class="badge bg-danger">Admin</span>
                            <?php else: ?>
                                <span class="badge bg-info">Customer</span>
                            <?php endif; ?>
                        </li>
                        <li>
                            <strong>Trạng thái:</strong><br>
                            <?php if (($data['user']['status'] ?? 'active') === 'active'): ?>
                                <span class="badge bg-success">Hoạt động</span>
                            <?php else: ?>
                                <span class="badge bg-secondary">Ẩn</span>
                            <?php endif; ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>