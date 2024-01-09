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
    

}
