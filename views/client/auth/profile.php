<style>
    .profile-container {
        max-width: 1200px;
        margin: 2rem auto;
    }

    .profile-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }

    .profile-header h1 {
        font-size: 2rem;
        font-weight: 700;
        color: var(--ink);
    }

    .logout-btn {
        background: #dc3545;
        color: white;
        padding: 0.7rem 1.5rem;
        border: none;
        border-radius: 0.5rem;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .logout-btn:hover {
        background: #c82333;
    }

    .profile-grid {
        display: grid;
        grid-template-columns: 1fr 2fr;
        gap: 2rem;
    }

    .profile-card {
        background: #ffffff;
        border: 1px solid #cfe3d2;
        border-radius: 1rem;
        padding: 2rem;
        box-shadow: 0 4px 16px rgba(24, 32, 38, 0.08);
    }

    .profile-card h2 {
        font-size: 1.25rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
        color: var(--ink);
        border-bottom: 2px solid var(--accent);
        padding-bottom: 0.75rem;
    }

    .profile-info-item {
        margin-bottom: 1.5rem;
    }

    .profile-info-label {
        font-weight: 600;
        color: #5a6f63;
        font-size: 0.9rem;
        margin-bottom: 0.3rem;
    }

    .profile-info-value {
        color: var(--ink);
        font-size: 1rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group label {
        display: block;
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: var(--ink);
    }

    .form-group input {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #cfe3d2;
        border-radius: 0.5rem;
        font-family: inherit;
        font-size: 0.95rem;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    .form-group input:focus {
        outline: none;
        border-color: var(--accent);
        box-shadow: 0 0 0 3px rgba(42, 165, 78, 0.1);
    }

    .update-btn {
        background: var(--accent);
        color: white;
        padding: 0.75rem 1.5rem;
        border: none;
        border-radius: 0.5rem;
        font-weight: 600;
        cursor: pointer;
        width: 100%;
        transition: all 0.3s ease;
    }

    .update-btn:hover {
        background: #1f7fbb;
        transform: translateY(-2px);
    }

    .alert {
        padding: 1rem;
        border-radius: 0.5rem;
        margin-bottom: 1.5rem;
        font-weight: 500;
    }

    .alert-success {
        background: #d4edda;
        border: 1px solid #c3e6cb;
        color: #155724;
    }

    .alert-danger {
        background: #f8d7da;
        border: 1px solid #f5c6cb;
        color: #721c24;
    }

    @media (max-width: 768px) {
        .profile-grid {
            grid-template-columns: 1fr;
        }

        .profile-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 1rem;
        }
    }
</style>

<div class="profile-container">
    <div class="profile-header">
        <h1>Hồ Sơ Của Tôi</h1>
        <a href="?action=logout" class="logout-btn">Đăng Xuất</a>
    </div>

    <?php if (!empty($data['message'])): ?>
        <div class="alert alert-success">
            ✓ <?= htmlspecialchars((string) $data['message']) ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($data['error'])): ?>
        <div class="alert alert-danger">
            ✗ <?= htmlspecialchars((string) $data['error']) ?>
        </div>
    <?php endif; ?>

    <div class="profile-grid">
        <!-- Thông Tin Cá Nhân -->
        <div class="profile-card">
            <h2>Thông Tin Cá Nhân</h2>

            <div class="profile-info-item">
                <div class="profile-info-label">Email:</div>
                <div class="profile-info-value"><?= htmlspecialchars((string) $data['user']['email']) ?></div>
            </div>

            <div class="profile-info-item">
                <div class="profile-info-label">Tên:</div>
                <div class="profile-info-value"><?= htmlspecialchars((string) $data['user']['name']) ?></div>
            </div>

            <div class="profile-info-item">
                <div class="profile-info-label">Số Điện Thoại:</div>
                <div class="profile-info-value"><?= htmlspecialchars((string) $data['user']['phone']) ?></div>
            </div>

            <div class="profile-info-item">
                <div class="profile-info-label">Ngày Đăng Ký:</div>
                <div class="profile-info-value">
                    <?= date('d/m/Y', strtotime($data['user']['created_at'] ?? '')) ?>
                </div>
            </div>
        </div>

        <!-- Cập Nhật Thông Tin -->
        <div class="profile-card">
            <h2>Cập Nhật Thông Tin</h2>

            <form method="POST" action="">
                <div class="form-group">
                    <label for="profile_name">Họ Và Tên:</label>
                    <input type="text" id="profile_name" name="name"
                        value="<?= htmlspecialchars((string) ($data['form_data']['name'] ?? $data['user']['name'] ?? '')) ?>"
                        required>
                </div>

                <div class="form-group">
                    <label for="profile_phone">Số Điện Thoại:</label>
                    <input type="tel" id="profile_phone" name="phone"
                        value="<?= htmlspecialchars((string) ($data['form_data']['phone'] ?? $data['user']['phone'] ?? '')) ?>"
                        required>
                </div>

                <button type="submit" class="update-btn">Cập Nhật Thông Tin</button>
            </form>
        </div>
    </div>
</div>