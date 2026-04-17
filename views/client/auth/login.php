<style>
    .auth-container {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        padding: 2rem 1rem;
    }

    .auth-card {
        background: #ffffff;
        border: 1px solid #cfe3d2;
        border-radius: 1rem;
        padding: 2.5rem;
        width: 100%;
        max-width: 450px;
        box-shadow: 0 4px 16px rgba(24, 32, 38, 0.08);
        animation: fade-up 0.6s ease both;
    }

    .auth-card h1 {
        font-size: 1.8rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        color: var(--ink);
        text-align: center;
    }

    .auth-card p {
        text-align: center;
        color: #5a6f63;
        margin-bottom: 2rem;
        font-size: 0.95rem;
    }

    .auth-form-group {
        margin-bottom: 1.5rem;
    }

    .auth-form-group label {
        display: block;
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: var(--ink);
        font-size: 0.9rem;
    }

    .auth-form-group input {
        width: 100%;
        padding: 0.85rem;
        border: 1px solid #cfe3d2;
        border-radius: 0.5rem;
        font-family: inherit;
        font-size: 0.95rem;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    .auth-form-group input:focus {
        outline: none;
        border-color: var(--accent);
        box-shadow: 0 0 0 3px rgba(42, 165, 78, 0.1);
    }

    .auth-form-group input::placeholder {
        color: #9fa9a3;
    }

    .remember-forgot {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
        font-size: 0.9rem;
    }

    .remember-forgot a {
        color: var(--accent);
        text-decoration: none;
        font-weight: 500;
    }

    .remember-forgot a:hover {
        text-decoration: underline;
    }

    .auth-submit-btn {
        width: 100%;
        padding: 0.9rem;
        background: var(--accent);
        color: #ffffff;
        border: none;
        border-radius: 0.5rem;
        font-weight: 700;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .auth-submit-btn:hover {
        background: #1f7fbb;
        transform: translateY(-2px);
        box-shadow: 0 8px 16px rgba(42, 165, 78, 0.3);
    }

    .auth-footer {
        text-align: center;
        margin-top: 1.5rem;
        font-size: 0.9rem;
        color: #5a6f63;
    }

    .auth-footer a {
        color: var(--accent);
        text-decoration: none;
        font-weight: 600;
    }

    .auth-footer a:hover {
        text-decoration: underline;
    }

    .alert {
        padding: 1rem;
        border-radius: 0.5rem;
        margin-bottom: 1.5rem;
        font-weight: 500;
        animation: fade-up 0.4s ease both;
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

    @keyframes fade-up {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @media (max-width: 768px) {
        .auth-card {
            padding: 2rem 1.5rem;
        }

        .auth-card h1 {
            font-size: 1.5rem;
        }
    }
</style>

<div class="auth-container">
    <div class="auth-card">
        <h1>Đăng Nhập</h1>
        <p>Đăng nhập để tiếp tục mua sắm</p>

        <?php if (!empty($data['error'])): ?>
            <div class="alert alert-danger">
                <?= htmlspecialchars((string) $data['error']) ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="auth-form-group">
                <label for="email">Email *</label>
                <input type="email" id="email" name="email" placeholder="your@email.com"
                    value="<?= htmlspecialchars((string) ($data['form_data']['email'] ?? '')) ?>" required autofocus>
            </div>

            <div class="auth-form-group">
                <label for="password">Mật Khẩu *</label>
                <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>
            </div>

            <div class="remember-forgot">
                <label style="display: flex; align-items: center; gap: 0.5rem; margin: 0; font-weight: 400;">
                    <input type="checkbox" name="remember" style="width: auto; margin: 0;">
                    Ghi nhớ tôi
                </label>
                <a href="#">Quên mật khẩu?</a>
            </div>

            <button type="submit" class="auth-submit-btn">Đăng Nhập</button>
        </form>

        <div class="auth-footer">
            Chưa có tài khoản? <a href="register">Đăng ký ngay</a>
        </div>
    </div>
</div>