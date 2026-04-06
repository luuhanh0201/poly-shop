<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $title ?? 'Poly Shop' ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Literata:opsz,wght@7..72,600&family=Space+Grotesk:wght@400;500;600&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: "Space Grotesk", sans-serif;
            background: linear-gradient(180deg, #f9f7f0 0%, #f4efe2 100%);
            color: #202b32;
        }

        .layout-box {
            max-width: 1100px;
            margin: 1.5rem auto;
            background: #fffdf8;
            border: 1px solid #e8dfcc;
            border-radius: 1rem;
            padding: 1rem;
        }

        .layout-title {
            font-family: "Literata", serif;
            margin-bottom: 1rem;
        }

        .top-nav {
            background: #fffdf8;
            border-bottom: 1px solid #e8dfcc;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand-xxl top-nav justify-content-center">
        <div class="navbar-nav">
            <a class="nav-link text-uppercase fw-semibold" href="<?= BASE_URL ?>">Home</a>
        </div>
    </nav>

    <div class="layout-box">
        <h1 class="layout-title"><?= $title ?? 'Home' ?></h1>

        <div class="row g-3">
            <?php
            if (isset($view)) {
                require_once __DIR__ . '/client/' . $view . '.php';
            }
            ?>
        </div>
    </div>

</body>

</html>