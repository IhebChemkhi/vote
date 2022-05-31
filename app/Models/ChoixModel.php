<?php

namespace App\Models;

use CodeIgniter\Model;

class ChoixModel extends Model
{
    protected $table = 't_choix_cho';
    protected $primaryKey = 'cho_id';
    protected $allowedFields = ['cho_id', 'cho_nom','vote_id'];
}
