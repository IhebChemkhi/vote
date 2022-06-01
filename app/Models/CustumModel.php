<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class CustumModel
{
    protected $db;
    public function __construct(ConnectionInterface &$db)
    {
        $this->db = &$db;
    }
    function CountRejeter($choID)
    {
        $builder = $this->db->table('t_vote_vote');
        $builder->join('t_choix_cho', 't_vote_vote.vote_id = t_choix_cho.vote_id', 'left');
        $builder->join('t_appreciation_app', 't_choix_cho.cho_id = t_appreciation_app.cho_id', 'left');
        $builder->where('t_appreciation_app.cho_id', $choID);
        $builder->where('t_appreciation_app.app_choix', 'rejeter');
        $app = $builder->countAllResults();
        return $app;
    }
    function CountTresMauvais($choID)
    {
        $builder = $this->db->table('t_vote_vote');
        $builder->join('t_choix_cho', 't_vote_vote.vote_id = t_choix_cho.vote_id', 'left');
        $builder->join('t_appreciation_app', 't_choix_cho.cho_id = t_appreciation_app.cho_id', 'left');
        $builder->where('t_appreciation_app.cho_id', $choID);
        $builder->where('t_appreciation_app.app_choix', 'tMauvais');
        $app = $builder->countAllResults();
        return $app;
    }
    function CountMauvais($choID)
    {
        $builder = $this->db->table('t_vote_vote');
        $builder->join('t_choix_cho', 't_vote_vote.vote_id = t_choix_cho.vote_id', 'left');
        $builder->join('t_appreciation_app', 't_choix_cho.cho_id = t_appreciation_app.cho_id', 'left');
        $builder->where('t_appreciation_app.cho_id', $choID);
        $builder->where('t_appreciation_app.app_choix', 'mauvais');
        $app = $builder->countAllResults();
        return $app;
    }
    function CountMoyen($choID)
    {
        $builder = $this->db->table('t_vote_vote');
        $builder->join('t_choix_cho', 't_vote_vote.vote_id = t_choix_cho.vote_id', 'left');
        $builder->join('t_appreciation_app', 't_choix_cho.cho_id = t_appreciation_app.cho_id', 'left');
        $builder->where('t_appreciation_app.cho_id', $choID);
        $builder->where('t_appreciation_app.app_choix', 'moyen');
        $app = $builder->countAllResults();
        return $app;
    }
    function CountBon($choID)
    {
        $builder = $this->db->table('t_vote_vote');
        $builder->join('t_choix_cho', 't_vote_vote.vote_id = t_choix_cho.vote_id', 'left');
        $builder->join('t_appreciation_app', 't_choix_cho.cho_id = t_appreciation_app.cho_id', 'left');
        $builder->where('t_appreciation_app.cho_id', $choID);
        $builder->where('t_appreciation_app.app_choix', 'bon');
        $app = $builder->countAllResults();
        return $app;
    }
    function CountTresBon($choID)
    {
        $builder = $this->db->table('t_vote_vote');
        $builder->join('t_choix_cho', 't_vote_vote.vote_id = t_choix_cho.vote_id', 'left');
        $builder->join('t_appreciation_app', 't_choix_cho.cho_id = t_appreciation_app.cho_id', 'left');
        $builder->where('t_appreciation_app.cho_id', $choID);
        $builder->where('t_appreciation_app.app_choix', 'tBon');
        $app = $builder->countAllResults();
        return $app;
    }

    function CountParfait($choID)
    {
        $builder = $this->db->table('t_vote_vote');
        $builder->join('t_choix_cho', 't_vote_vote.vote_id = t_choix_cho.vote_id', 'left');
        $builder->join('t_appreciation_app', 't_choix_cho.cho_id = t_appreciation_app.cho_id', 'left');
        $builder->where('t_appreciation_app.cho_id', $choID);
        $builder->where('t_appreciation_app.app_choix', 'parfait');
        $app = $builder->countAllResults();
        return $app;
    }
}
