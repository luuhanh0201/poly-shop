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


}
