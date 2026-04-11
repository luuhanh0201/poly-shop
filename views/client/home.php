<style>
    .spotlight {
        border-radius: 1rem;
        border: 1px solid #cfe3d2;
        background: linear-gradient(145deg, #f1fff3 0%, #edf7ff 100%);
        padding: 1.5rem;
        margin-bottom: 2rem;
        animation: fade-up .5s ease both;
    }

    .spotlight-title {
        font-size: 1.3rem;
        font-weight: 700;
        margin: 0;
        color: var(--ink);
    }

    .spotlight-sub {
        color: #355845;
        margin-bottom: 0;
        font-size: 0.95rem;
    }

    .category-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 1rem;
    }

    .category-card {
        border: 1px solid #cfe3d2;
        border-radius: 1rem;
        background: #fafffb;
        padding: 1rem;
        position: relative;
        overflow: hidden;
        min-height: 170px;
        transition: transform .25s ease, box-shadow .25s ease;
        animation: fade-up .6s ease both;
        text-decoration: none;
        color: inherit;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
    }

    .category-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 28px rgba(24, 32, 38, 0.12);
        border-color: var(--accent);
    }

    .category-card::after {
        content: "";
        width: 90px;
        height: 90px;
        border-radius: 999px;
        position: absolute;
        top: -20px;
        right: -20px;
        background: linear-gradient(135deg, rgba(42, 165, 78, 0.2), rgba(31, 127, 187, 0.2));
        z-index: 0;
    }

    .category-card>* {
        position: relative;
        z-index: 1;
    }

    .category-id {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 2rem;
        height: 2rem;
        border-radius: 0.7rem;
        background: #e6f5e9;
        color: #2f6041;
        font-size: 0.85rem;
        font-weight: 700;
        margin-bottom: 0.7rem;
    }

    .category-name {
        margin-bottom: 0.45rem;
        font-size: 1.05rem;
        font-weight: 700;
        color: var(--ink);
    }

    .category-meta {
        color: #3e5f4a;
        margin-bottom: 0;
        font-size: 0.92rem;
    }

    .category-arrow {
        color: var(--accent);
        font-size: 0.9rem;
        margin-top: auto;
        opacity: 0;
        transition: opacity .2s ease;
    }

    .category-card:hover .category-arrow {
        opacity: 1;
    }

    .section-head {
        display: flex;
        justify-content: space-between;
        align-items: end;
        margin-bottom: 1.5rem;
        margin-top: 2rem;
    }

    .section-head h2 {
        margin: 0;
        font-size: 1.5rem;
        font-weight: 700;
    }

    .view-all-link {
        color: var(--accent);
        text-decoration: none;
        font-weight: 600;
        font-size: 0.95rem;
        transition: all .2s ease;
    }

    .view-all-link:hover {
        gap: 0.5rem;
    }

    .hot-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 1.5rem;
        margin-top: 1.5rem;
    }

    .hot-card {
        border: 1px solid #cfe3d2;
        border-radius: 1rem;
        background: #ffffff;
        overflow: hidden;
        transition: all .3s ease;
        display: flex;
        flex-direction: column;
    }

    .hot-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 28px rgba(24, 32, 38, 0.12);
        border-color: var(--accent);
    }

    .hot-card-image {
        width: 100%;
        height: 180px;
        background: linear-gradient(135deg, #f0f5f2, #f5faff);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
        color: #cfe3d2;
        overflow: hidden;
    }

    .hot-card-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .hot-card-content {
        padding: 1rem;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .hot-card .tag {
        display: inline-block;
        border-radius: 999px;
        background: #e8f7ec;
        color: #1f7a3d;
        font-size: 0.75rem;
        padding: 0.3rem 0.7rem;
        margin-bottom: 0.6rem;
        width: fit-content;
    }

    .hot-card h4 {
        font-size: 1.05rem;
        margin: 0 0 0.35rem 0;
        font-weight: 700;
    }

    .hot-card p {
        font-size: 0.9rem;
        margin: 0 0 0.8rem 0;
        color: #5a6f63;
        flex-grow: 1;
    }

    .hot-card-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 0.8rem;
        border-top: 1px solid #cfe3d2;
    }

    .hot-card .price {
        font-weight: 700;
        color: var(--accent);
        font-size: 1.1rem;
    }

    .hot-card-link {
        background: var(--soft);
        color: var(--accent);
        border: 1px solid var(--accent);
        padding: 0.5rem 0.8rem;
        border-radius: 0.5rem;
        text-decoration: none;
        font-size: 0.85rem;
        font-weight: 600;
        transition: all .2s ease;
    }

    .hot-card-link:hover {
        background: var(--accent);
        color: #ffffff;
    }

    .contact-box {
        margin-top: 2rem;
        border: 1px solid #cfe3d2;
        border-radius: 1rem;
        background: linear-gradient(120deg, #f2fff4 0%, #edf7ff 100%);
        padding: 1.5rem;
    }

    .contact-box h3 {
        font-size: 1.2rem;
        margin-bottom: 1rem;
        font-weight: 700;
    }

    .contact-list {
        margin: 0;
        padding-left: 1rem;
        color: #385847;
        list-style: none;
    }

    .contact-list li {
        margin-bottom: 0.6rem;
        padding-left: 1.5rem;
        position: relative;
    }

    .contact-list li:before {
        content: "→";
        position: absolute;
        left: 0;
        color: var(--accent);
        font-weight: 700;
    }

    .no-products {
        grid-column: 1 / -1;
        text-align: center;
        padding: 2rem;
        background: var(--soft);
        border-radius: 1rem;
        color: #5a6f63;
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

    @media (max-width: 1199.98px) {
        .hot-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 991.98px) {
        .category-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .hot-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .section-head {
            flex-direction: column;
            align-items: flex-start;
            gap: 0.5rem;
        }
    }

    @media (max-width: 575.98px) {
        .category-grid {
            grid-template-columns: repeat(1, minmax(0, 1fr));
        }

        .hot-grid {
            grid-template-columns: repeat(1, minmax(0, 1fr));
        }

        .section-head h2 {
            font-size: 1.3rem;
        }
    }
</style>

<!-- Banner Section -->
<style>
    .banner-section {
        margin: 0 -12px -1.5rem -12px;
        border-radius: 1rem;
        overflow: hidden;
        margin-bottom: 1.5rem;
        box-shadow: 0 4px 16px rgba(24, 32, 38, 0.08);
    }

    .banner-image {
        width: 100%;
        height: 300px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #f0f5f2, #f5faff);
        overflow: hidden;
    }

    .banner-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    @media (max-width: 768px) {
        .banner-image {
            height: 200px;
        }
    }

    @media (max-width: 575.98px) {
        .banner-image {
            height: 150px;
        }
    }
</style>

<div class="banner-section">
    <div class="banner-image">
        <img src="<?= BASE_URL ?>/uploads/banner.webp" alt="Banner">
    </div>
</div>

<div class="section-head" id="san-pham-hot" style="margin-top: 2.5rem;">
    <h2>Sản phẩm mới nhất</h2>
    <a href="?action=products" class="view-all-link">Xem tất cả →</a>
</div>

<section class="hot-grid">
    <?php if (!empty($data['latestProducts'])): ?>
        <?php foreach ($data['latestProducts'] as $product): ?>
            <article class="hot-card">
                <div class="hot-card-image">
                    <?php if (!empty($product['image'])): ?>
                        <img src="<?= BASE_URL . '/uploads/'  . htmlspecialchars((string) $product['image']) ?>"
                            alt="<?= htmlspecialchars((string) $product['name']) ?>">
                    <?php else: ?>
                    
                    <?php endif; ?>
                </div>
                <div class="hot-card-content">
                    <span class="tag"><?= htmlspecialchars((string) ($product['category_name'] ?? 'Sản phẩm')) ?></span>
                    <h4><?= htmlspecialchars((string) $product['name']) ?></h4>
                    <p><?= htmlspecialchars((string) (substr($product['description'] ?? '', 0, 70))) ?></p>
                    <div class="hot-card-footer">
                        <div class="price">
                            <?= number_format((int) ($product['price'] ?? 0), 0, ',', '.') ?> VND
                        </div>
                        <a href="?action=product-detail&id=<?= htmlspecialchars((string) $product['id']) ?>"
                            class="hot-card-link">
                            Xem chi tiết
                        </a>
                    </div>
                </div>
            </article>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="no-products">
            <p>Chưa có sản phẩm. Vui lòng thêm sản phẩm trong trang quản trị.</p>
        </div>
    <?php endif; ?>
</section>

<!-- Sản phẩm theo danh mục -->
<?php if (!empty($data['productsByCategory'])): ?>
    <?php foreach ($data['productsByCategory'] as $categoryId => $categoryData): ?>
        <?php if (!empty($categoryData['products'])): ?>
            <div class="section-head" style="margin-top: 2.5rem;">
                <h2>Sản phẩm <?= htmlspecialchars((string) $categoryData['name']) ?></h2>
                <a href="?action=products&category=<?= htmlspecialchars((string) $categoryId) ?>" class="view-all-link">Xem tất cả
                    →</a>
            </div>

            <section class="hot-grid">
                <?php foreach ($categoryData['products'] as $product): ?>
                    <article class="hot-card">
                        <div class="hot-card-image">
                            <?php if (!empty($product['image'])): ?>
                                <img src="<?= BASE_URL . '/uploads/'  . htmlspecialchars((string) $product['image']) ?>"
                                    alt="<?= htmlspecialchars((string) $product['name']) ?>">
                            <?php else: ?>
                               
                            <?php endif; ?>
                        </div>
                        <div class="hot-card-content">
                            <span class="tag"><?= htmlspecialchars((string) ($product['category_name'] ?? 'Sản phẩm')) ?></span>
                            <h4><?= htmlspecialchars((string) $product['name']) ?></h4>
                            <p><?= htmlspecialchars((string) (substr($product['description'] ?? '', 0, 70))) ?></p>
                            <div class="hot-card-footer">
                                <div class="price">
                                    <?= number_format((int) ($product['price'] ?? 0), 0, ',', '.') ?> VND
                                </div>
                                <a href="?action=product-detail&id=<?= htmlspecialchars((string) $product['id']) ?>"
                                    class="hot-card-link">
                                    Xem chi tiết
                                </a>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </section>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endif; ?>

<section class="contact-box" id="lien-he">
    <h3>Liên hệ chúng tôi</h3>
    <ul class="contact-list">
        <li><strong>Hotline:</strong> 0399095138</li>
        <li><strong>Email:</strong> luuhanh0201@gmail.com</li>
        <li><strong>Địa chỉ:</strong> 378 Thuỵ khuê, Tây Hồ, Hà Nội</li>
    </ul>
</section>