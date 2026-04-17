<style>
    .products-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .search-bar {
        flex: 1;
        min-width: 250px;
        position: relative;
    }

    .search-bar input {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 1px solid var(--line);
        border-radius: 0.75rem;
        background: var(--soft);
        font-size: 0.95rem;
        transition: all .2s ease;
    }

    .search-bar input:focus {
        outline: none;
        border-color: var(--accent);
        box-shadow: 0 0 0 3px rgba(42, 165, 78, 0.1);
    }

    .filter-section {
        display: flex;
        gap: 1rem;
        margin-bottom: 1.5rem;
        flex-wrap: wrap;
    }

    .filter-group {
        display: flex;
        gap: 0.5rem;
        align-items: center;
    }

    .filter-group label {
        font-weight: 500;
        color: #355845;
    }

    .filter-group select {
        padding: 0.6rem 0.9rem;
        border: 1px solid var(--line);
        border-radius: 0.6rem;
        background: var(--soft);
        cursor: pointer;
        font-size: 0.9rem;
    }

    .filter-group select:focus {
        outline: none;
        border-color: var(--accent);
    }

    .product-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .product-card {
        border: 1px solid var(--line);
        border-radius: 1rem;
        background: #ffffff;
        overflow: hidden;
        transition: all .3s ease;
        display: flex;
        flex-direction: column;
    }

    .product-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 16px 32px rgba(24, 32, 38, 0.12);
        border-color: var(--accent);
    }

    .product-image {
        width: 100%;
        height: 200px;
        background: linear-gradient(135deg, #f0f5f2, #f5faff);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
        color: #cfe3d2;
        overflow: hidden;
    }

    .product-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .product-info {
        padding: 1rem;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .product-category {
        display: inline-block;
        font-size: 0.75rem;
        color: var(--accent);
        background: rgba(42, 165, 78, 0.1);
        padding: 0.3rem 0.6rem;
        border-radius: 0.4rem;
        margin-bottom: 0.5rem;
        width: fit-content;
    }

    .product-name {
        font-size: 1rem;
        font-weight: 700;
        margin-bottom: 0.4rem;
        line-height: 1.3;
        min-height: 2.6rem;
    }

    .product-desc {
        font-size: 0.85rem;
        color: #5a6f63;
        margin-bottom: 0.6rem;
        flex-grow: 1;
    }

    .product-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 0.8rem;
        border-top: 1px solid var(--line);
    }

    .product-price {
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--accent);
    }

    .product-link {
        background: var(--soft);
        color: var(--accent);
        border: 1px solid var(--accent);
        padding: 0.5rem 0.9rem;
        border-radius: 0.5rem;
        text-decoration: none;
        font-size: 0.9rem;
        font-weight: 600;
        transition: all .2s ease;
    }

    .product-link:hover {
        background: var(--accent);
        color: #ffffff;
    }

    .empty-state {
        grid-column: 1 / -1;
        text-align: center;
        padding: 3rem 2rem;
        background: var(--soft);
        border: 1px dashed var(--line);
        border-radius: 1rem;
    }

    .empty-state h3 {
        color: #5a6f63;
        margin-bottom: 0.5rem;
    }

    .empty-state p {
        color: #3e5f4a;
    }

    .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 0.5rem;
        margin-top: 2rem;
    }

    .pagination a,
    .pagination span {
        padding: 0.6rem 0.9rem;
        border: 1px solid var(--line);
        border-radius: 0.5rem;
        text-decoration: none;
        color: var(--ink);
        transition: all .2s ease;
    }

    .pagination a:hover {
        background: var(--accent);
        color: #ffffff;
        border-color: var(--accent);
    }

    .pagination .active {
        background: var(--accent);
        color: #ffffff;
        border-color: var(--accent);
    }

    .pagination .disabled {
        color: #aaa;
        cursor: not-allowed;
    }

    @media (max-width: 1199.98px) {
        .product-grid {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }
    }

    @media (max-width: 991.98px) {
        .product-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .products-header {
            flex-direction: column;
            align-items: stretch;
        }

        .search-bar {
            min-width: auto;
        }
    }

    @media (max-width: 575.98px) {
        .product-grid {
            grid-template-columns: 1fr;
        }

        .filter-section {
            flex-direction: column;
        }

        .filter-group {
            flex-direction: column;
            align-items: flex-start;
        }
    }
</style>

<div class="products-header">
    <h1 style="margin: 0; font-size: 1.8rem;">Danh sách sản phẩm</h1>
    <form method="GET" class="search-bar" style="margin: 0;">
        <input type="hidden" name="action" value="products">
        <input type="text" name="search" placeholder="Tìm kiếm sản phẩm..." value="<?= htmlspecialchars($search) ?>">
    </form>
</div>

<div class="filter-section">
    <div class="filter-group">
        <label for="category-filter">Danh mục:</label>
        <form method="GET" id="category-form" style="display: inline;">
            <input type="hidden" name="action" value="products">
            <input type="hidden" name="search" value="<?= htmlspecialchars($search) ?>">
            <select name="category" id="category-filter" onchange="document.getElementById('category-form').submit()">
                <option value="">Tất cả danh mục</option>
                <?php foreach ($categories ?? [] as $cat): ?>
                    <option value="<?= htmlspecialchars((string) $cat['id']) ?>" <?= $category_id == $cat['id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars((string) $cat['name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </form>
    </div>

    <span class="text-muted small">Tổng: <?= $total ?? 0 ?> sản phẩm</span>
</div>

<div class="product-grid">
    <?php if (!empty($data)): ?>
        <?php foreach ($data as $product): ?>
            <article class="product-card">
                <div class="product-image">
                    <?php if (!empty($product['image'])): ?>
                        <img src="<?= BASE_URL . '/uploads/' . htmlspecialchars((string) ($product['image'] ?? '')) ?>"
                            alt="<?= htmlspecialchars((string) $product['name']) ?>">
                    <?php else: ?>
                        
                    <?php endif; ?>
                </div>
                <div class="product-info">
                    <span class="product-category"><?= htmlspecialchars((string) ($product['category_name'] ?? 'Khác')) ?></span>
                    <h3 class="product-name"><?= htmlspecialchars((string) $product['name']) ?></h3>
                    <p class="product-desc"><?= htmlspecialchars((string) (substr($product['description'] ?? '', 0, 60))) ?></p>
                    <div class="product-footer">
                        <div class="product-price">
                            <?= number_format((int) ($product['price'] ?? 0), 0, ',', '.') ?> VND
                        </div>
                        <a href="product-detail&id=<?= htmlspecialchars((string) $product['id']) ?>"
                            class="product-link">
                            Chi tiết →
                        </a>
                    </div>
                </div>
            </article>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="empty-state">
            <h3>Không tìm thấy sản phẩm</h3>
            <p>Vui lòng thử tìm kiếm hoặc lọc với từ khóa khác</p>
        </div>
    <?php endif; ?>
</div>

<?php if ($totalPages > 1): ?>
    <div class="pagination">
        <?php if ($page > 1): ?>
            <a href="products&page=1&search=<?= urlencode($search) ?>&category=<?= urlencode($category_id) ?>">← Đầu
                tiên</a>
            <a
                href="products&page=<?= $page - 1 ?>&search=<?= urlencode($search) ?>&category=<?= urlencode($category_id) ?>">←
                Trước</a>
        <?php else: ?>
            <span class="disabled">← Đầu tiên</span>
            <span class="disabled">← Trước</span>
        <?php endif; ?>

        <?php
        $start = max(1, $page - 2);
        $end = min($totalPages, $page + 2);
        for ($i = $start; $i <= $end; $i++):
            ?>
            <?php if ($i == $page): ?>
                <span class="active"><?= $i ?></span>
            <?php else: ?>
                <a
                    href="products&page=<?= $i ?>&search=<?= urlencode($search) ?>&category=<?= urlencode($category_id) ?>"><?= $i ?></a>
            <?php endif; ?>
        <?php endfor; ?>

        <?php if ($page < $totalPages): ?>
            <a
                href="products&page=<?= $page + 1 ?>&search=<?= urlencode($search) ?>&category=<?= urlencode($category_id) ?>">Tiếp
                →</a>
            <a
                href="products&page=<?= $totalPages ?>&search=<?= urlencode($search) ?>&category=<?= urlencode($category_id) ?>">Cuối
                →</a>
        <?php else: ?>
            <span class="disabled">Tiếp →</span>
            <span class="disabled">Cuối →</span>
        <?php endif; ?>
    </div>
<?php endif; ?>