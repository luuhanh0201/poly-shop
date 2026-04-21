<style>
    .product-detail-container {
        background: #ffffff;
        border: 1px solid var(--line);
        border-radius: 1.2rem;
        padding: 2rem;
        margin-bottom: 2rem;
    }

    .product-detail-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 3rem;
        margin-bottom: 2rem;
    }

    .product-gallery {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .product-main-image {
        width: 100%;
        height: 400px;
        background: linear-gradient(135deg, #f0f5f2, #f5faff);
        border: 1px solid var(--line);
        border-radius: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 6rem;
        color: #cfe3d2;
        overflow: hidden;
    }

    .product-main-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .product-thumbnails {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 0.8rem;
    }

    .product-thumbnail {
        width: 100%;
        height: 80px;
        background: var(--soft);
        border: 2px solid transparent;
        border-radius: 0.6rem;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 1.5rem;
        transition: all .2s ease;
    }

    .product-thumbnail:hover {
        border-color: var(--accent);
    }

    .product-details-info {
        display: flex;
        flex-direction: column;
    }

    .product-badge {
        display: inline-block;
        background: rgba(42, 165, 78, 0.1);
        color: var(--accent);
        padding: 0.4rem 0.8rem;
        border-radius: 0.5rem;
        font-size: 0.85rem;
        font-weight: 600;
        margin-bottom: 1rem;
        width: fit-content;
    }

    .product-title {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        line-height: 1.2;
    }

    .product-category-detail {
        color: #5a6f63;
        font-size: 1rem;
        margin-bottom: 1.5rem;
    }

    .product-rating {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 1.5rem;
        color: #5a6f63;
    }

    .product-price-detail {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--accent);
        margin-bottom: 1rem;
    }

    .product-availability {
        display: flex;
        align-items: center;
        gap: 0.8rem;
        margin-bottom: 1.5rem;
        font-size: 1.05rem;
    }

    .availability-badge {
        display: inline-block;
        padding: 0.5rem 1rem;
        border-radius: 0.5rem;
        font-weight: 600;
    }

    .availability-badge.in-stock {
        background: rgba(42, 165, 78, 0.1);
        color: var(--accent);
    }

    .availability-badge.out-stock {
        background: rgba(255, 107, 107, 0.1);
        color: #d32f2f;
    }

    .product-description {
        color: #5a6f63;
        line-height: 1.6;
        margin-bottom: 2rem;
        padding: 1.5rem;
        background: var(--soft);
        border-radius: 0.8rem;
    }

    .product-actions {
        display: flex;
        gap: 1rem;
        margin-bottom: 2rem;
    }

    .btn-primary {
        flex: 1;
        padding: 1rem 2rem;
        background: var(--accent);
        color: #ffffff;
        border: none;
        border-radius: 0.8rem;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all .2s ease;
    }

    .btn-primary:hover {
        background: #23873d;
        transform: translateY(-2px);
        box-shadow: 0 8px 16px rgba(42, 165, 78, 0.3);
    }

    .btn-secondary {
        flex: 1;
        padding: 1rem 2rem;
        background: var(--soft);
        color: var(--accent);
        border: 2px solid var(--accent);
        border-radius: 0.8rem;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all .2s ease;
    }

    .btn-secondary:hover {
        background: var(--accent);
        color: #ffffff;
    }

    .product-specs {
        background: var(--soft);
        border: 1px solid var(--line);
        border-radius: 0.8rem;
        padding: 1.5rem;
        margin-bottom: 2rem;
    }

    .product-specs h3 {
        margin-top: 0;
        margin-bottom: 1rem;
        font-size: 1.2rem;
    }

    .specs-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
    }

    .spec-item {
        display: flex;
        justify-content: space-between;
        padding: 0.8rem;
        border-bottom: 1px solid var(--line);
    }

    .spec-label {
        font-weight: 600;
        color: #355845;
    }

    .spec-value {
        color: #5a6f63;
    }

    .related-products {
        margin-top: 3rem;
        padding-top: 2rem;
        border-top: 2px solid var(--line);
    }

    .related-products h2 {
        font-size: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .related-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 1.5rem;
    }

    .related-card {
        border: 1px solid var(--line);
        border-radius: 0.8rem;
        overflow: hidden;
        transition: all .3s ease;
    }

    .related-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 16px rgba(24, 32, 38, 0.1);
    }

    .related-image {
        width: 100%;
        height: 150px;
        background: linear-gradient(135deg, #f0f5f2, #f5faff);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        color: #cfe3d2;
        overflow: hidden;
    }

    .related-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .related-info {
        padding: 0.8rem;
    }

    .related-name {
        font-weight: 600;
        font-size: 0.9rem;
        margin-bottom: 0.4rem;
    }

    .related-price {
        color: var(--accent);
        font-weight: 700;
        font-size: 0.9rem;
    }

    @media (max-width: 991.98px) {
        .product-detail-grid {
            grid-template-columns: 1fr;
            gap: 2rem;
        }

        .related-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .product-title {
            font-size: 1.5rem;
        }

        .product-price-detail {
            font-size: 2rem;
        }
    }

    @media (max-width: 575.98px) {
        .product-detail-container {
            padding: 1rem;
        }

        .product-detail-grid {
            gap: 1.5rem;
        }

        .product-main-image {
            height: 300px;
            font-size: 4rem;
        }

        .product-actions {
            flex-direction: column;
        }

        .btn-primary,
        .btn-secondary {
            width: 100%;
        }

        .related-grid {
            grid-template-columns: 1fr;
        }

        .specs-grid {
            grid-template-columns: 1fr;
        }

        .product-title {
            font-size: 1.3rem;
        }

        .product-price-detail {
            font-size: 1.8rem;
        }
    }
</style>

<?php if ($data): ?>
    <div class="product-detail-container">
        <div class="product-detail-grid">
            <!-- Gallery -->
            <div class="product-gallery">
                <div class="product-main-image">
                    <?php if (!empty($data['image'])): ?>
                        <img src="<?= BASE_URL . '/uploads/' . htmlspecialchars((string) $data['image']) ?>"
                            alt="<?= htmlspecialchars((string) $data['name']) ?>">
                    <?php else: ?>

                    <?php endif; ?>
                </div>
            </div>

            <!-- Product Info -->
            <div class="product-details-info">
                <span class="product-badge"><?= htmlspecialchars((string) ($data['category_name'] ?? 'Danh mục')) ?></span>

                <h1 class="product-title"><?= htmlspecialchars((string) $data['name']) ?></h1>

                <div class="product-category-detail">
                    ID sản phẩm: #<?= htmlspecialchars((string) $data['id']) ?>
                </div>

                <div class="product-rating">
                    ⭐⭐⭐⭐⭐ <span>(12 đánh giá)</span>
                </div>

                <div class="product-price-detail">
                    <?= number_format((int) ($data['price'] ?? 0), 0, ',', '.') ?> VND
                </div>

                <div class="product-availability">
                    <?php if ((int) ($data['quantity'] ?? 0) > 0): ?>
                        <span class="availability-badge in-stock">Còn hàng</span>
                        <span style="color: #5a6f63;"><?= htmlspecialchars((string) $data['quantity']) ?> sản phẩm</span>
                    <?php else: ?>
                        <span class="availability-badge out-stock">Hết hàng</span>
                    <?php endif; ?>
                </div>

                <div class="product-description">
                    <strong>Mô tả sản phẩm:</strong><br>
                    <?= nl2br(htmlspecialchars((string) ($data['description'] ?? 'Không có mô tả'))) ?>
                </div>

                <div class="product-actions">
                    <?php if ((int) ($data['quantity'] ?? 0) > 0): ?>
                        <button class="btn-primary" onclick="alert('Chức năng thêm vào giỏ hàng sẽ sớm có')">
                            Thêm vào giỏ hàng
                        </button>
                    <?php else: ?>
                        <button class="btn-primary" disabled style="opacity: 0.5; cursor: not-allowed;">
                            Hết hàng
                        </button>
                    <?php endif; ?>
                    <button class="btn-secondary" onclick="alert('Chức năng yêu thích sẽ sớm có')">
                        Yêu thích
                    </button>
                </div>

                <div class="product-specs">
                    <h3>Thông tin chi tiết</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <span class="spec-label">Tên sản phẩm:</span>
                            <span class="spec-value"><?= htmlspecialchars((string) $data['name']) ?></span>
                        </div>
                        <div class="spec-item">
                            <span class="spec-label">Danh mục:</span>
                            <span
                                class="spec-value"><?= htmlspecialchars((string) ($data['category_name'] ?? 'Khác')) ?></span>
                        </div>
                        <div class="spec-item">
                            <span class="spec-label">Giá:</span>
                            <span class="spec-value"><?= number_format((int) ($data['price'] ?? 0), 0, ',', '.') ?>
                                VND</span>
                        </div>
                        <div class="spec-item">
                            <span class="spec-label">Số lượng:</span>
                            <span class="spec-value"><?= htmlspecialchars((string) ($data['quantity'] ?? 0)) ?> cái</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Products -->
        <?php if (!empty($related)): ?>
            <div class="related-products">
                <h2>Sản phẩm liên quan</h2>
                <div class="related-grid">
                    <?php foreach ($related as $product): ?>
                        <article class="related-card">
                            <div class="related-image">
                                <?php if (!empty($product['image'])): ?>
                                    <img src="<?= BASE_URL . '/uploads/' . htmlspecialchars((string) $product['image']) ?>"
                                        alt="<?= htmlspecialchars((string) $product['name']) ?>">
                                <?php else: ?>
                                    📦
                                <?php endif; ?>
                            </div>
                            <div class="related-info">
                                <h4 class="related-name"><?= htmlspecialchars((string) $product['name']) ?></h4>
                                <div class="related-price">
                                    <?= number_format((int) ($product['price'] ?? 0), 0, ',', '.') ?> VND
                                </div>
                                <a href="product-detail?id=<?= htmlspecialchars((string) $product['id']) ?>"
                                    style="display: block; margin-top: 0.8rem; text-align: center; color: var(--accent); text-decoration: none; font-size: 0.85rem; font-weight: 600;">
                                    Xem chi tiết →
                                </a>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <!-- Back Link -->
    <div style="margin-bottom: 2rem;">
        <a href="products"
            style="color: var(--accent); text-decoration: none; font-weight: 600; display: inline-flex; align-items: center; gap: 0.5rem;">
            ← Quay lại danh sách sản phẩm
        </a>
    </div>
<?php else: ?>
    <div style="text-align: center; padding: 3rem 2rem; background: var(--soft); border-radius: 1rem;">
        <h2>Sản phẩm không tồn tại</h2>
        <p style="color: #5a6f63;">Vui lòng quay lại <a href="products"
                style="color: var(--accent); text-decoration: none;">danh sách sản phẩm</a></p>
    </div>
<?php endif; ?>