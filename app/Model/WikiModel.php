<?php

namespace App\Model;

use PDO;
use PDOException;

class WikiModel extends Crud
{

    public function readwikis()
    {
        try {
            $query = "select wiki.id,wiki.title,wiki.description, wiki.image,user.name as Author , status,categorie.name as Categorie
            from wiki
            inner join user 
            on user.id = wiki.user_id
            inner join categorie 
            on categorie.id = wiki.categorie_id
            where wiki.status = 'Pending';";

            $stmt = $this->pdo->query($query);

            $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $records; // Return the fetched records
        } catch (PDOException $e) {
            echo "Error fetching records: " . $e->getMessage();
            return []; // Return an empty array in case of an error
        }
    }


    public function readwikisuser($id)
    {
        try {
            $query = "SELECT  wiki.image,wiki.id, wiki.title, wiki.description, user.name AS Author, status, categorie.name AS Categorie
                FROM wiki
                INNER JOIN user ON user.id = wiki.user_id
                INNER JOIN categorie ON categorie.id = wiki.categorie_id
                WHERE wiki.user_id = :id ;";

            // Prepare and execute the SQL statement with named parameter
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();

            $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $records; // Return the fetched records
        } catch (PDOException $e) {
            echo "Error fetching records: " . $e->getMessage();
            return []; // Return an empty array in case of an error
        }
    }



    public function createwikis($data)
    {
        return $this->create('wiki', $data);
    }

    public function deletewikis($id)
    {
        return $this->delete('wiki', $id);
    }


    public function editwikis($id, $data)
    {
        return $this->update('wiki', $id, $data);
    }

    public function showcontent($id)
    {
        try {
            $query = "SELECT content FROM wiki WHERE id = :id ;";

            // Prepare and execute the SQL statement
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();

            $record = $stmt->fetch(PDO::FETCH_ASSOC); // Use fetch instead of fetchAll

            return $record; // Return the fetched record
        } catch (PDOException $e) {
            echo "Error fetching records: " . $e->getMessage();
            return []; // Return an empty array in case of an error
        }
    }


    public function home()
    {
        try {
            $query = "select wiki.id,wiki.title,wiki.description, wiki.image,DAY(date) AS day, MONTH(date) AS month, YEAR(date) AS year,
            user.name as Author , status,categorie.name as Categorie,
            categorie.image as imageCat , categorie.name as nameCat
            from wiki
            inner join user 
            on user.id = wiki.user_id
            inner join categorie 
            on categorie.id = wiki.categorie_id
            where wiki.status = 'Approved'
            ORDER BY date DESC
            LIMIT 5;";

            $stmt = $this->pdo->query($query);

            $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $records; // Return the fetched records
        } catch (PDOException $e) {
            echo "Error fetching records: " . $e->getMessage();
            return []; // Return an empty array in case of an error
        }
    }

    public function home2()
    {
        try {
            $query = "select wiki.id,wiki.title,wiki.description, wiki.image,DAY(date) AS day, MONTH(date) AS month, YEAR(date) AS year,
            user.name as Author , status,categorie.name as Categorie,
            categorie.image as imageCat , categorie.name as nameCat
            from wiki
            inner join user 
            on user.id = wiki.user_id
            inner join categorie 
            on categorie.id = wiki.categorie_id
            where wiki.status = 'Approved';
           ";

            $stmt = $this->pdo->query($query);

            $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $records; // Return the fetched records
        } catch (PDOException $e) {
            echo "Error fetching records: " . $e->getMessage();
            return []; // Return an empty array in case of an error
        }
    }

}
