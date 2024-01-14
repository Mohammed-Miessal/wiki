<?php

namespace App\Model;

use PDO;
use PDOException;


class TagModel extends Crud
{

    public function readtags()
    {
        return $this->read('tag');
    }
    
    public function createtags($data){
        return $this->create('tag', $data);
    }

    public function deletetags($id){
        return $this->delete('tag', $id);

    }
    
    public function edittags($id, $data)
    {
        return $this->update('tag', $id, $data);
    }


    public function totalTags()
    {
        try {
            $stmt = $this->pdo->prepare("SELECT COUNT(*) as total FROM tag  ");
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
