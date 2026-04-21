<?php

class CommentModel extends BaseModel
{
    public function create($productId, $userId, $content)
    {
        $sql = "INSERT INTO comments (product_id, user_id, content) VALUES (:product_id, :user_id, :content)";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            'product_id' => (int) $productId,
            'user_id' => (int) $userId,
            'content' => trim($content),
        ]);
    }

    // Chỉ trả về comment hiển thị (dùng ở phía client)
    public function getByProductId($productId)
    {
        $sql = "SELECT c.id, c.content, c.created_at, c.user_id, c.status, u.name AS user_name
                FROM comments c
                INNER JOIN users u ON u.id = c.user_id
                WHERE c.product_id = :product_id AND c.status = 'visible'
                ORDER BY c.created_at DESC, c.id DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['product_id' => (int) $productId]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Tất cả comment mọi trạng thái (dùng ở admin)
    public function getAll()
    {
        $sql = "SELECT c.id, c.content, c.created_at, c.status, c.user_id, c.product_id,
                       u.name AS user_name, p.name AS product_name
                FROM comments c
                INNER JOIN users u ON u.id = c.user_id
                INNER JOIN products p ON p.id = c.product_id
                ORDER BY c.created_at DESC, c.id DESC";

        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    // Đặt trạng thái (visible / hidden)
    public function setStatus($id, $status)
    {
        $allowed = ['visible', 'hidden'];
        if (!in_array($status, $allowed, true)) {
            return false;
        }

        $sql = "UPDATE comments SET status = :status WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute(['id' => (int) $id, 'status' => $status]);
    }

    // Xóa comment bởi chính chủ
    public function deleteByIdAndUser($id, $userId)
    {
        $sql = "DELETE FROM comments WHERE id = :id AND user_id = :user_id";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute(['id' => (int) $id, 'user_id' => (int) $userId]);
    }

    // Xóa comment bởi admin
    public function deleteById($id)
    {
        $sql = "DELETE FROM comments WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute(['id' => (int) $id]);
    }
}
