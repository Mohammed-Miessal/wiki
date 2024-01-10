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

    public function createcategories($data){
        return $this->create('categorie', $data);
    }

    public function deletecategorie ($id){    
        return $this->delete('categorie', $id);
    }

    
    public function editcategorie ($id,$data){    
        return $this->update('categorie', $id ,$data );
    }

}
