<?php

namespace App\Model;

use PDO;
use PDOException;

class UserModel extends Crud
{

    public function createUser($data)
    {
        try {
            $columns = implode(", ", array_diff(array_keys($data), ['id']));
            $values = ":" . implode(", :", array_diff(array_keys($data), ['id']));

            $query = "INSERT INTO user ($columns) VALUES ($values)";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute($data);
        } catch (PDOException $e) {
            echo "Error creating record: " . $e->getMessage();
        }
    }


    public function login($email)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM user WHERE email = :email");
            $stmt->execute([':email' => $email]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Database Error: ' . $e->getMessage();
            exit();
        }
    }


    public function totalUsers()
    {
        try {
            $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM user WHERE role_id = 1");
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Database Error: ' . $e->getMessage();
            exit();
        }
    }

    
}
