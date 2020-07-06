<?php namespace App\Models;

use CodeIgniter\Model;

class RelacionModel extends Model
{
    protected $DBGroup = "default";

    protected $table      = 'relacion';
    protected $primaryKey = 'id_relacion';

    protected $returnType     = 'array';

    protected $allowedFields = ['fk_personaje_1','fk_personaje_2'];


}