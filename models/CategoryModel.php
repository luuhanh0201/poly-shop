<?php

class CategoryModel extends BaseModel
{
    public function getAll()
    {
        $sql = "SELECT * FROM categories";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getById($id)
    {
        $sql = "SELECT * FROM categories WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }
    public function create($name)
    {
        $sql = "INSERT INTO categories (name) VALUES (:name)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['name' => $name]);
    }
    public function update($id, $name)
    {
        $sql = "UPDATE categories SET name = :name WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['id' => $id, 'name' => $name]);
    }
    public function delete($id)
    {
        $sql = "DELETE FROM categories WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
    
}