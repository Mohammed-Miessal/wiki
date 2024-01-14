<?php

namespace App\Model;

use PDO;
use PDOException;

class WikiModel extends Crud
{

    public function readwikis()
    {
        try {
            $query = "SELECT 
            wiki.id,
            wiki.title,
            wiki.description,
            wiki.image,
            user.name as Author,
            status,
            categorie.name as Categorie,
            (SELECT GROUP_CONCAT(t.name) FROM tag t
             INNER JOIN wiki_tag p ON p.id_tag = t.id
             WHERE p.id_wiki = wiki.id) AS Tags
        FROM wiki
        INNER JOIN user ON user.id = wiki.user_id
        INNER JOIN categorie ON categorie.id = wiki.categorie_id
        WHERE wiki.status = 'Pending';
        ";

            $stmt = $this->pdo->query($query);

            $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $records; // Return the fetched records
        } catch (PDOException $e) {
            echo "Error fetching records: " . $e->getMessage();
            return []; // Return an empty array in case of an error
        }
    }


    // J'ai utiliser une sous-requête pour 
    // concaténer les noms des tags liés à chaque  wiki
    public function readwikisuser($id)
    {
        try {
            $query = "SELECT 
            wiki.image,
            wiki.id,
            wiki.title,
            wiki.description,
            user.name AS Author,
            status,
            categorie.name AS Categorie,
            (SELECT GROUP_CONCAT(t.name) FROM tag t
             INNER JOIN wiki_tag p ON p.id_tag = t.id
             WHERE p.id_wiki = wiki.id) AS Tags
        FROM wiki
        INNER JOIN user ON user.id = wiki.user_id
        INNER JOIN categorie ON categorie.id = wiki.categorie_id
        WHERE wiki.user_id = :id;
        ";

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


    public function createwikis($data, $tags)
    {
        try {
            $this->create('wiki', $data);
            $wikiId = $this->pdo->lastInsertId();
            $tagIds = [];
            foreach ($tags as $tag) {
                $tag = trim($tag);

                // Check if the tag already exists
                $tagExistsQuery = "SELECT id FROM Tag WHERE name = :tag";
                $tagStmt = $this->pdo->prepare($tagExistsQuery);
                $tagStmt->bindParam(':tag', $tag);
                $tagStmt->execute();
                $tagResult = $tagStmt->fetch(PDO::FETCH_ASSOC);

                if ($tagResult) {
                    // Tag already exists, get its ID
                    $tagIds[] = $tagResult['id'];
                } else {
                    // Tag does not exist, add it to the tags table
                    $addTagQuery = "INSERT INTO Tag (name) VALUES (:tag)";
                    $addTagStmt = $this->pdo->prepare($addTagQuery);
                    $addTagStmt->bindParam(':tag', $tag);
                    $addTagStmt->execute();

                    // Get the ID of the newly added tag
                    $tagIds[] = $this->pdo->lastInsertId();
                }
            }
            // Add wiki-tag relationships
            foreach ($tagIds as $tagId) {
                $addWikiTagQuery = "INSERT INTO wiki_tag (id_wiki,id_tag) VALUES (:id_wiki, :id_tag)";
                $addWikiTagStmt = $this->pdo->prepare($addWikiTagQuery);
                $addWikiTagStmt->bindParam(':id_wiki', $wikiId);
                $addWikiTagStmt->bindParam(':id_tag', $tagId);
                $addWikiTagStmt->execute();
            }
        } catch (PDOException $e) {
            echo "Error inserting wiki with tags: " . $e->getMessage();
        }
    }

    // public function WikiTags($id)
    // {
    //     try {
    //         $query = "SELECT t.name FROM   tag t
    //         INNER JOIN wiki_tag p ON p.id_tag = t.id
    //         WHERE p.id_wiki = $id;";
    //         $stmt = $this->pdo->query($query);
    //         $tags = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //         return $tags;
    //     } catch (PDOException $e) {
    //         die("ERROR: Could not execute $query. " . $e->getMessage());
    //     }
    // }



    // public function createwikis($data)
    // {
    //     return $this->create('wiki', $data);
    // }

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


    public function search($title, $categorie)
    {
        if ($categorie == '') {
            $query = "SELECT wiki.id, wiki.title, wiki.description, wiki.image, DAY(date) AS day, MONTH(date) AS month, YEAR(date) AS year,
            user.name AS Author, status, categorie.name AS Categorie,
            categorie.image AS imageCat, categorie.name AS nameCat
     FROM wiki
     INNER JOIN user ON user.id = wiki.user_id
     INNER JOIN categorie ON categorie.id = wiki.categorie_id
     WHERE wiki.status = 'Approved' AND (wiki.title LIKE '%$title%' OR user.name LIKE '%$title%')";
        } else {
            $query = "SELECT wiki.id, wiki.title, wiki.description, wiki.image, DAY(date) AS day, MONTH(date) AS month, YEAR(date) AS year,
            user.name AS Author, status, categorie.name AS Categorie,
            categorie.image AS imageCat, categorie.name AS nameCat
     FROM wiki
     INNER JOIN user ON user.id = wiki.user_id
     INNER JOIN categorie ON categorie.id = wiki.categorie_id
     WHERE wiki.status = 'Approved' AND (wiki.title LIKE '%$title%' OR user.name LIKE '%$title%') AND (categorie.id = $categorie );
           ";
        }
        try {

            $stmt = $this->pdo->query($query);

            $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $records; // Return the fetched records
        } catch (PDOException $e) {
            echo "Error fetching records: " . $e->getMessage();
            return []; // Return an empty array in case of an error
        }
    }
}
