<?php

class UserModel extends BaseModel
{
    public function findByEmail($email)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findById($id)
    {
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $sql = "INSERT INTO users (email, password, name, phone, created_at) 
                VALUES (:email, :password, :name, :phone, NOW())";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'email' => $data['email'] ?? '',
            'password' => password_hash($data['password'] ?? '', PASSWORD_BCRYPT),
            'name' => $data['name'] ?? '',
            'phone' => $data['phone'] ?? ''
        ]);
    }

    public function createByAdmin($data)
    {
        $sql = "INSERT INTO users (email, password, name, phone, role, created_at)
                VALUES (:email, :password, :name, :phone, :role, NOW())";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'email' => $data['email'] ?? '',
            'password' => password_hash($data['password'] ?? '', PASSWORD_BCRYPT),
            'name' => $data['name'] ?? '',
            'phone' => $data['phone'] ?? '',
            'role' => $data['role'] ?? 'customer'
        ]);
    }

    public function update($id, $data)
    {
        $sql = "UPDATE users SET name = :name, phone = :phone WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'id' => $id,
            'name' => $data['name'] ?? '',
            'phone' => $data['phone'] ?? ''
        ]);
    }

    public function updateWithRole($id, $data)
    {
        $sql = "UPDATE users SET name = :name, phone = :phone, role = :role WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'id' => $id,
            'name' => $data['name'] ?? '',
            'phone' => $data['phone'] ?? '',
            'role' => $data['role'] ?? 'customer'
        ]);
    }

    public function getAll($limit = 10, $offset = 0)
    {
        $sql = "SELECT id, email, name, phone, role, created_at FROM users ORDER BY created_at DESC LIMIT :limit OFFSET :offset";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int) $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotal()
    {
        $sql = "SELECT COUNT(*) as total FROM users";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'] ?? 0;
    }

    public function deleteById($id)
    {
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}
