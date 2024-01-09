<?php

namespace App\Model;

use PDO;
use PDOException;

class WikiModel extends Crud
{

    public function readwikis()
    {
        try {
            $query = "select wiki.title,wiki.description,user.name as Author ,categorie.name as Categorie
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
}
