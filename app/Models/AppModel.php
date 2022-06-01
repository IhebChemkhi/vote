<?php

namespace App\Models;

use CodeIgniter\Model;

class AppModel extends Model
{
    protected $table = 't_appreciation_app';
    protected $primaryKey = 'app_id';
    protected $allowedFields = ['app_id', 'app_choix','cho_id'];
    protected function getAllApp(){
       
    }
}
