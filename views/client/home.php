<style>
    .spotlight {
        border-radius: 1rem;
        border: 1px solid #cfe3d2;
        background: linear-gradient(145deg, #f1fff3 0%, #edf7ff 100%);
        padding: 1.2rem;
        margin-bottom: 1.25rem;
        animation: fade-up .5s ease both;
    }

    .spotlight-title {
        font-size: 1.1rem;
        font-weight: 700;
        margin-bottom: 0.35rem;
    }

    .spotlight-sub {
        color: #355845;
        margin-bottom: 0;
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
    }

    .category-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 28px rgba(24, 32, 38, 0.09);
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
    }

    .category-meta {
        color: #3e5f4a;
        margin-bottom: 0;
        font-size: 0.92rem;
    }

    .section-head {
        display: flex;
        justify-content: space-between;
        align-items: end;
        margin-bottom: 0.9rem;
    }

    .section-head h2 {
        margin: 0;
        font-size: 1.3rem;
    }

    .hot-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 1rem;
        margin-top: 1.4rem;
    }

    .hot-card {
        border: 1px solid #cfe3d2;
        border-radius: 1rem;
        background: #ffffff;
        padding: 1rem;
    }

    .hot-card .tag {
        display: inline-block;
        border-radius: 999px;
        background: #e8f7ec;
        color: #1f7a3d;
        font-size: 0.75rem;
        padding: 0.2rem 0.6rem;
        margin-bottom: 0.55rem;
    }

    .hot-card h4 {
        font-size: 1rem;
        margin-bottom: 0.35rem;
    }

    .hot-card p {
        font-size: 0.9rem;
        margin-bottom: 0.65rem;
        color: #436451;
    }

    .hot-card .price {
        font-weight: 700;
        color: #1f7fbb;
    }

    .contact-box {
        margin-top: 1.4rem;
        border: 1px solid #cfe3d2;
        border-radius: 1rem;
        background: linear-gradient(120deg, #f2fff4 0%, #edf7ff 100%);
        padding: 1rem;
    }

    .contact-box h3 {
        font-size: 1.2rem;
        margin-bottom: 0.45rem;
    }

    .contact-list {
        margin: 0;
        padding-left: 1rem;
        color: #385847;
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

    @media (max-width: 991.98px) {
        .category-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .hot-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 575.98px) {
        .category-grid {
            grid-template-columns: repeat(1, minmax(0, 1fr));
        }

        .hot-grid {
            grid-template-columns: repeat(1, minmax(0, 1fr));
        }
    }
</style>

<section class="spotlight">
    <div class="spotlight-title">Sản phẩm chính hãng, đa dạng mẫu mã</div>
</section>

<div class="section-head" id="danh-muc">
    <h2>Danh mục nổi bật</h2>
    <span class="text-muted small">Tổng: <?= count($data ?? []) ?> danh mục</span>
</div>

<div class="category-grid">
    <?php foreach (($data ?? []) as $index => $item): ?>
        <?php
        $name = $item['name'] ?? ('Danh muc ' . ($index + 1));
        $id = $item['id'] ?? ($index + 1);
        ?>
        <article class="category-card" style="animation-delay: <?= ($index * 70) ?>ms;">
            <span class="category-id">#<?= htmlspecialchars((string) $id) ?></span>
            <h3 class="category-name"><?= htmlspecialchars((string) $name) ?></h3>
        </article>
    <?php endforeach; ?>

    <?php if (empty($data)): ?>
        <article class="category-card">
            <h3 class="category-name">Chua co du lieu danh muc</h3>
            <p class="category-meta">Vui long them danh muc trong trang quan tri de hien thi noi dung.</p>
        </article>
    <?php endif; ?>
</div>

<div class="section-head" id="san-pham-hot" style="margin-top: 1.5rem;">
    <h2>Sản phẩm hot</h2>
    <span class="text-muted small">Top bán chạy tuần này</span>
</div>

<section class="hot-grid">
    <article class="hot-card">
        <span class="tag">Vot cau long</span>
        <h4>Yonex Astrox Lite</h4>
        <p>Vot nhe, linh hoat cho danh doi cong thu toan dien.</p>
        <div class="price">1.290.000 VND</div>
    </article>
    <article class="hot-card">
        <span class="tag">Giay thi dau</span>
        <h4>Lining Thunder Run</h4>
        <p>Dem em, bam san tot, ho tro di chuyen nhanh va on dinh.</p>
        <div class="price">1.050.000 VND</div>
    </article>
    <article class="hot-card">
        <span class="tag">Phu kien</span>
        <h4>Tui vot 2 ngan Pro Bag</h4>
        <p>Gon nhe, chong am, du suc chua vot, giay va do tap.</p>
        <div class="price">590.000 VND</div>
    </article>
</section>

<section class="contact-box" id="lien-he">
    <h3>Lien he</h3>
    <ul class="contact-list">
        <li>Hotline: 0900 123 456</li>
        <li>Email: support@badmintonhub.vn</li>
        <li>Dia chi: 12 Nguyen Van Bao, Go Vap, TP.HCM</li>
    </ul>
</section>