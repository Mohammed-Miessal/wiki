<?php

namespace App\Model;

use PDO;
use PDOException;


class CategorieModel extends Crud
{

    public function readcategories()
    {
        return $this->read('categorie');
    }

    public function createcategories($data)
    {
        return $this->create('categorie', $data);
    }

    public function deletecategorie($id)
    {
        return $this->delete('categorie', $id);
    }


    public function editcategorie($id, $data)
    {
        return $this->update('categorie', $id, $data);
    }

    public function totalCategories()
    {
        try {
            $stmt = $this->pdo->prepare("SELECT COUNT(*) as total FROM categorie  ");
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result === false) {
                return ["count" => 0];
            }

            return $result;
        } catch (PDOException $e) {
            echo 'Database Error: ' . $e->getMessage();
            exit();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            exit();
        }
    }


}
