<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Quản trị' ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --admin-bg: #f3f5f8;
            --admin-surface: #ffffff;
            --admin-ink: #1e293b;
            --admin-muted: #64748b;
            --admin-line: #e2e8f0;
            --admin-accent: #0f766e;
        }

        body {
            margin: 0;
            background: var(--admin-bg);
            color: var(--admin-ink);
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        }

        .admin-layout {
            min-height: 100vh;
            display: grid;
            grid-template-columns: 250px 1fr;
        }

        .admin-sidebar {
            background: #0f172a;
            color: #e2e8f0;
            padding: 1rem;
        }

        .admin-brand {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .admin-menu a {
            display: block;
            padding: 0.55rem 0.7rem;
            border-radius: 0.55rem;
            text-decoration: none;
            color: #cbd5e1;
            margin-bottom: 0.3rem;
            font-size: 0.95rem;
        }

        .admin-menu a:hover,
        .admin-menu a.active {
            background: rgba(148, 163, 184, 0.18);
            color: #ffffff;
        }

        .admin-content {
            padding: 1rem;
        }

        .admin-topbar {
            background: var(--admin-surface);
            border: 1px solid var(--admin-line);
            border-radius: 0.75rem;
            padding: 0.8rem 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .admin-topbar h1 {
            margin: 0;
            font-size: 1.1rem;
            font-weight: 700;
        }

        .admin-topbar .meta {
            color: var(--admin-muted);
            font-size: 0.88rem;
        }

        .admin-panel {
            background: var(--admin-surface);
            border: 1px solid var(--admin-line);
            border-radius: 0.75rem;
            padding: 1rem;
        }

        .status-pill {
            display: inline-flex;
            align-items: center;
            padding: 0.25rem 0.65rem;
            border-radius: 999px;
            font-size: 0.8rem;
            border: 1px solid #99f6e4;
            color: #0f766e;
            background: #f0fdfa;
        }

        @media (max-width: 991.98px) {
            .admin-layout {
                grid-template-columns: 1fr;
            }

            .admin-sidebar {
                padding: 0.8rem;
            }

            .admin-menu {
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 0.4rem;
            }

            .admin-menu a {
                margin-bottom: 0;
            }
        }
    </style>
</head>

<body>
    <div class="admin-layout">
        <aside class="admin-sidebar">
            <div class="admin-brand">Admin Panel</div>
            <nav class="admin-menu">
                <a href="<?= BASE_URL_ADMIN ?>" class="active">Dashboard</a>
                <a href="<?= BASE_URL_ADMIN ?>/categories">Quản lý danh mục</a>
                <a href="<?= BASE_URL_ADMIN ?>/products">Quản lý sản phẩm</a>
                <a href="#">Quản lý đơn hàng</a>
                <a href="#">Quản lý người dùng</a>
                <a href="<?= BASE_URL ?>">Về trang người dùng</a>
            </nav>
        </aside>

        <main class="admin-content">
            <div class="admin-panel">
                <?php if (isset($view)) {
                    require_once PATH_VIEW_ADMIN . $view . '.php';
                } ?>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>