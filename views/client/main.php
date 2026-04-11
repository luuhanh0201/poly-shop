<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $title ?? 'Badminton Hub' ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.css" integrity="sha512-NhLySQDkiKSKnT+R795uaHWRQ7D3VuIvgeOLCK8cWq4w5fq4sWF90gj8eURpTqn/f1mFzqClpOz8JPlgVTLfFw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
        href="https://fonts.googleapis.com/css2?family=Literata:opsz,wght@7..72,500;7..72,700&family=Space+Grotesk:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --bg: #eef7ef;
            --ink: #15211a;
            --accent: #2aa54e;
            --accent-2: #1f7fbb;
            --soft: #f8fff9;
            --line: #cfe3d2;
        }

        body {
            font-family: "Space Grotesk", sans-serif;
            background:
                radial-gradient(circle at 12% 10%, #d7f7df 0%, transparent 35%),
                radial-gradient(circle at 90% 18%, #d8eefb 0%, transparent 35%),
                linear-gradient(180deg, #f6fff7 0%, #eef7ef 100%);
            color: var(--ink);
            min-height: 100vh;
        }

        .brand-font {
            font-family: "Literata", serif;
            letter-spacing: 0.03em;
        }

        .site-nav {
            background: rgba(255, 253, 247, 0.85);
            backdrop-filter: blur(8px);
            border-bottom: 1px solid var(--line);
        }

        .brand-badge {
            width: 2.2rem;
            height: 2.2rem;
            border-radius: 0.75rem;
            background: linear-gradient(135deg, var(--accent), #56cd76);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 700;
            margin-right: 0.5rem;
        }

        .hero {
            border: 1px solid var(--line);
            border-radius: 1.2rem;
            background: linear-gradient(120deg, rgba(42, 165, 78, 0.14), rgba(31, 127, 187, 0.12));
            padding: 2rem;
            margin: 1.5rem 0;
            animation: rise-in .6s ease both;
        }

        .hero h1 {
            font-family: "Literata", serif;
            font-weight: 700;
            margin-bottom: 0.75rem;
        }

        .hero p {
            max-width: 42rem;
            margin-bottom: 0;
            color: #2e4736;
        }

        .chip {
            display: inline-flex;
            align-items: center;
            border: 1px solid var(--line);
            border-radius: 999px;
            padding: 0.4rem 0.9rem;
            background: var(--soft);
            margin-right: 0.4rem;
            margin-top: 0.4rem;
            font-size: 0.85rem;
        }

        .content-shell {
            background: rgba(255, 253, 247, 0.9);
            border: 1px solid var(--line);
            border-radius: 1.2rem;
            padding: 2rem;
            margin-bottom: 3rem;
        }

        .user-actions .nav-link {
            border-radius: 999px;
            padding: 0.45rem 0.9rem;
        }

        .user-actions .nav-link:hover {
            background: #e6f5e9;
        }

        .site-footer {
            border-top: 1px solid var(--line);
            padding: 1rem 0 2rem;
            color: #3d5f49;
            font-size: 0.9rem;
        }

        .menu-link {
            font-weight: 500;
        }

        .menu-link:hover {
            color: var(--accent);
        }

        .auth-link {
            border: 1px solid var(--line);
            margin-left: 0.4rem;
        }

        .auth-link.primary {
            background: var(--accent);
            border-color: var(--accent);
            color: #fff;
        }

        .auth-link.primary:hover {
            background: #239042;
            color: #fff;
        }

        @keyframes rise-in {
            from {
                transform: translateY(12px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @media (max-width: 767.98px) {
            .hero {
                padding: 1.3rem;
                margin-top: 1rem;
            }

            .hero h1 {
                font-size: 1.5rem;
            }
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand-lg site-nav sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="<?= BASE_URL ?>">
                <span class="brand-badge">P</span>
                <span class="brand-font fw-bold">Poly shop</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainMenu">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a href="<?= BASE_URL ?>" class="nav-link menu-link">Trang chủ</a></li>
                    <li class="nav-item"><a href="<?= BASE_URL ?>?action=products" class="nav-link menu-link">Sản
                            phẩm</a></li>
                    <li class="nav-item"><a href="#" class="nav-link menu-link">Liên hệ</a>
                    </li>
                </ul>

                <ul class="navbar-nav user-actions">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <li class="nav-item">
                            <a href="<?= BASE_URL ?>?action=profile" class="nav-link menu-link"
                                style="color: var(--accent); font-weight: 600;">
                                <i class="fas fa-user"></i> <?= htmlspecialchars((string) $_SESSION['user_name']) ?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= BASE_URL ?>?action=logout" class="nav-link auth-link primary">Đăng Xuất</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item"><a href="<?= BASE_URL ?>?action=register" class="nav-link auth-link">Đăng
                                ký</a></li>
                        <li class="nav-item"><a href="<?= BASE_URL ?>?action=login" class="nav-link auth-link primary">Đăng
                                nhập</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container" style="padding-top: 1.5rem;">


        <div class="content-shell">
            <?php
            if (isset($view)) {
                require_once PATH_VIEW_CLIENT . $view . '.php';
            }
            ?>
        </div>

        <footer class="site-footer">
            <div style="text-align: center; color: #5a6f63;">
                <p style="margin: 0;"> <strong>Poly shop</strong> - Đồ bền, đẹp và đúng chất cho người chơi cầu
                    lông.</p>
                <p style="margin: 0.5rem 0 0 0; font-size: 0.85rem;">© 2026 Poly Shop. Tất cả quyền được bảo lưu.</p>
            </div>
        </footer>
    </div>

</body>

</html>