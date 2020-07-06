<?php namespace App\Models;

use CodeIgniter\Model;

class CategoriaModel extends Model
{
    protected $DBGroup = "default";

    protected $table      = 'categoria';
    protected $primaryKey = 'id_categoria';

    protected $returnType     = 'array';

    protected $allowedFields = ['nombre_categoria'];


}