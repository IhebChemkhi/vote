<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 't_vote_vote';
    protected $primaryKey = 'vote_id';
    protected $allowedFields = ['vote_question', 'vote_etat','vote_id','vote_urlPublic','vote_urlPrive'];
}
