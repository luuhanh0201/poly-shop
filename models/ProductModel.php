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
    public function create($data)
    {
        $sql = "INSERT INTO products (name, price, category_id, image, description) VALUES (:name, :price, :category_id, :image, :description)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'name' => $data['name'],
            'price' => $data['price'],
            'category_id' => $data['category_id'],
            'image' => $data['image'] ?? null,
            'description' => $data['description'] ?? null
        ]);

        return $this->pdo->lastInsertId();
    }
    public function update($id, $data)
    {
        $sql = "UPDATE products SET name = :name, price = :price, category_id = :category_id, image = :image, description = :description WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'id' => $id,
            'name' => $data['name'],
            'price' => $data['price'],
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
}