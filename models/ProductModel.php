<?php
class ProductModel extends BaseModel
{
    public function getAll()
    {
        $sql = "SELECT p.*, c.name AS category_name FROM products p LEFT JOIN categories c ON p.category_id = c.id";
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $sql = "SELECT p.*, c.name AS category_name FROM products p LEFT JOIN categories c ON p.category_id = c.id WHERE p.id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function search($search = '', $categoryId = '', $limit = 12, $offset = 0)
    {
        $sql = "SELECT p.*, c.name AS category_name FROM products p 
                LEFT JOIN categories c ON p.category_id = c.id 
                WHERE 1=1";

        if ($search) {
            $sql .= " AND p.name LIKE :search";
        }

        if ($categoryId) {
            $sql .= " AND p.category_id = :category_id";
        }

        $sql .= " ORDER BY p.id DESC LIMIT $limit OFFSET $offset";

        $stmt = $this->pdo->prepare($sql);
        if ($search)
            $stmt->bindValue(':search', "%$search%");
        if ($categoryId)
            $stmt->bindValue(':category_id', $categoryId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function searchTotal($search = '', $categoryId = '')
    {
        $sql = "SELECT COUNT(*) as total FROM products p WHERE 1=1";

        if ($search) {
            $sql .= " AND p.name LIKE :search";
        }

        if ($categoryId) {
            $sql .= " AND p.category_id = :category_id";
        }

        $stmt = $this->pdo->prepare($sql);
        if ($search)
            $stmt->bindValue(':search', "%$search%");
        if ($categoryId)
            $stmt->bindValue(':category_id', $categoryId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }

    public function create($data)
    {
        $sql = "INSERT INTO products (name, price, quantity, category_id, image, description) VALUES (:name, :price, :quantity, :category_id, :image, :description)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'name' => $data['name'],
            'price' => $data['price'],
            'quantity' => $data['quantity'],
            'category_id' => $data['category_id'],
            'image' => $data['image'] ?? null,
            'description' => $data['description'] ?? null
        ]);

        return $this->pdo->lastInsertId();
    }

    public function update($id, $data)
    {
        $sql = "UPDATE products SET name = :name, price = :price, quantity = :quantity, category_id = :category_id, image = :image, description = :description WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'id' => $id,
            'name' => $data['name'],
            'price' => $data['price'],
            'quantity' => $data['quantity'],
            'category_id' => $data['category_id'],
            'image' => $data['image'] ?? null,
            'description' => $data['description'] ?? null
        ]);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM products WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }

    public function getTotal()
    {
        $sql = "SELECT COUNT(*) as total FROM products";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }

    public function getAllWithLimit($limit = 10, $offset = 0)
    {
        $sql = "SELECT p.*, c.name AS category_name FROM products p LEFT JOIN categories c ON p.category_id = c.id ORDER BY p.id DESC LIMIT $limit OFFSET $offset";
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getLatestProducts($limit = 6)
    {
        $limit = (int) $limit;
        $sql = "SELECT p.*, c.name AS category_name FROM products p 
                LEFT JOIN categories c ON p.category_id = c.id 
                ORDER BY p.id DESC LIMIT $limit";
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductsByCategory($categoryId, $limit = 6)
    {
        $categoryId = (int) $categoryId;
        $limit = (int) $limit;
        $sql = "SELECT p.*, c.name AS category_name FROM products p 
                LEFT JOIN categories c ON p.category_id = c.id 
                WHERE p.category_id = :category_id
                ORDER BY p.id DESC LIMIT $limit";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':category_id', $categoryId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}