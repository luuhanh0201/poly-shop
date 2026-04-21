<style>
    .badge-visible {
        display: inline-block;
        padding: 0.25rem 0.6rem;
        border-radius: 999px;
        font-size: 0.78rem;
        font-weight: 600;
        background: #f0fdf4;
        color: #15803d;
        border: 1px solid #bbf7d0;
    }

    .badge-hidden {
        display: inline-block;
        padding: 0.25rem 0.6rem;
        border-radius: 999px;
        font-size: 0.78rem;
        font-weight: 600;
        background: #fef9c3;
        color: #854d0e;
        border: 1px solid #fde68a;
    }

    .comment-cell {
        max-width: 360px;
        word-break: break-word;
        white-space: pre-wrap;
    }
</style>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="mb-0" style="font-size:1.2rem;">Quản lý bình luận</h2>
    <span class="text-muted small">Tổng: <?= count($data ?? []) ?> bình luận</span>
</div>

<?php if (!empty($data)): ?>
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle" style="font-size:0.9rem;">
            <thead class="table-light">
                <tr>
                    <th style="width:50px;">#</th>
                    <th>Người dùng</th>
                    <th>Sản phẩm</th>
                    <th>Nội dung</th>
                    <th style="width:100px;">Trạng thái</th>
                    <th style="width:120px;">Thời gian</th>
                    <th style="width:160px;">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $comment): ?>
                    <tr>
                        <td><strong>#<?= (int) $comment['id'] ?></strong></td>
                        <td><?= htmlspecialchars((string) ($comment['user_name'] ?? '')) ?></td>
                        <td><?= htmlspecialchars((string) ($comment['product_name'] ?? '')) ?></td>
                        <td class="comment-cell"><?= htmlspecialchars((string) ($comment['content'] ?? '')) ?></td>
                        <td>
                            <?php if (($comment['status'] ?? '') === 'visible'): ?>
                                <span class="badge-visible">Hiển thị</span>
                            <?php else: ?>
                                <span class="badge-hidden">Đã ẩn</span>
                            <?php endif; ?>
                        </td>
                        <td style="white-space:nowrap;">
                            <?= date('d/m/Y H:i', strtotime((string) ($comment['created_at'] ?? 'now'))) ?>
                        </td>
                        <td style="white-space:nowrap;">
                            <?php if (($comment['status'] ?? '') === 'visible'): ?>
                                <a href="<?= BASE_URL_ADMIN ?>/comments/hide?id=<?= (int) $comment['id'] ?>"
                                    class="btn btn-sm btn-warning" onclick="return confirm('Ẩn bình luận này?')" title="Ẩn">
                                    <i class="fas fa-eye-slash"></i> Ẩn
                                </a>
                            <?php else: ?>
                                <a href="<?= BASE_URL_ADMIN ?>/comments/approve?id=<?= (int) $comment['id'] ?>"
                                    class="btn btn-sm btn-success" title="Hiện">
                                    <i class="fas fa-check"></i> Hiện
                                </a>
                            <?php endif; ?>
                            <a href="<?= BASE_URL_ADMIN ?>/comments/delete?id=<?= (int) $comment['id'] ?>"
                                class="btn btn-sm btn-danger" onclick="return confirm('Xóa bình luận này? Không thể hoàn tác!')"
                                title="Xóa">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <div class="text-center py-5 text-muted">
        <p>Chưa có bình luận nào.</p>
    </div>
<?php endif; ?>