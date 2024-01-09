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

}
