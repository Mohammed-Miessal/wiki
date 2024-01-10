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
    

}
