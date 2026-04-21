<div class="container-fluid py-4">
    <div class="row mb-4">
        <div class="col-md-6">
            <h1 class="h3"><i class="fas fa-user-plus"></i> Thêm Người Dùng</h1>
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
                    <?php if (!empty($data['error'])): ?>
                        <div class="alert alert-danger alert-dismissible fade show">
                            <i class="fas fa-exclamation-circle"></i> <?= htmlspecialchars((string) $data['error']) ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="">
                        <div class="mb-3">
                            <label class="form-label"><i class="fas fa-user"></i> Họ Và Tên *</label>
                            <input type="text" class="form-control" name="name"
                                value="<?= htmlspecialchars((string) ($data['form_data']['name'] ?? '')) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><i class="fas fa-envelope"></i> Email *</label>
                            <input type="email" class="form-control" name="email"
                                value="<?= htmlspecialchars((string) ($data['form_data']['email'] ?? '')) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><i class="fas fa-phone"></i> Số Điện Thoại *</label>
                            <input type="tel" class="form-control" name="phone"
                                value="<?= htmlspecialchars((string) ($data['form_data']['phone'] ?? '')) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><i class="fas fa-lock"></i> Mật Khẩu *</label>
                            <input type="password" class="form-control" name="password" minlength="6" required>
                            <small class="text-muted">Tối thiểu 6 ký tự</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><i class="fas fa-cog"></i> Role *</label>
                            <select class="form-select" name="role" required>
                                <option value="customer" <?= (($data['form_data']['role'] ?? 'customer') === 'customer') ? 'selected' : '' ?>>
                                    Customer (Người dùng)
                                </option>
                                <option value="admin" <?= (($data['form_data']['role'] ?? '') === 'admin') ? 'selected' : '' ?>>
                                    Admin (Quản trị viên)
                                </option>
                            </select>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success btn-lg">
                                <i class="fas fa-plus-circle"></i> Tạo Người Dùng
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>