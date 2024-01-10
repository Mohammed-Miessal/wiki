<?php

namespace App\Model;

use PDO;
use PDOException;

class WikiModel extends Crud
{

    public function readwikis()
    {
        try {
            $query = "select wiki.id,wiki.title,wiki.description,user.name as Author , status,categorie.name as Categorie
            from wiki
            inner join user 
            on user.id = wiki.user_id
            inner join categorie 
            on categorie.id = wiki.categorie_id;";

            $stmt = $this->pdo->query($query);

            $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $records; // Return the fetched records
        } catch (PDOException $e) {
            echo "Error fetching records: " . $e->getMessage();
            return []; // Return an empty array in case of an error
        }
    }

    public function createwikis($data)
    {
        try {
            $columns = implode(", ", array_keys($data));
            $values = ":" . implode(", :", array_keys($data));

            $query = "INSERT INTO wiki ($columns) VALUES ($values)";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute($data);

            // echo "Record added successfully!";
        } catch (PDOException $e) {
            echo "Error creating record: " . $e->getMessage();
        }
    }

    public function deletewikis($id){
        return $this->delete('wiki', $id);

    }
    
}
