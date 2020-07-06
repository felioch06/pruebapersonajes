<?php namespace App\Models;

use CodeIgniter\Model;

class PersonajeModel extends Model
{
    protected $DBGroup = "default";

    protected $table      = 'personajes';
    protected $primaryKey = 'id_personaje';

    protected $returnType     = 'array';

    protected $allowedFields = ['nombre', 'edad', 'biografia', 'fk_categoria', 'foto'];


}