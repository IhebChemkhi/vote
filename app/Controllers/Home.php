<?php

namespace App\Controllers;

use App\Models\UserModel;

class Home extends BaseController
{
    public function index()
    {
        helper(['form']);
        echo view('temp/haut');
        echo view('votePage');
        echo view('temp/bas');
    }

    public function voteCreer()
    {
        $data = [];
        helper(['form']);
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'question' => 'required',
            ];
            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $model = new UserModel();
                $newData = [
                    'vote_question' => $this->request->getVar('question'),
                    'vote_etat' => 'A',
                    'vote_id' => 3,
                    'vote_urlPublic' => "tesdazeaz",
                    'vote_urlPrive' => "teetzeaze",
                ];
                $model->insert($newData);
                $session = session();
                $session->setFlashdata('success', 'vote crée');
                return redirect()->to("home/voteCreer");
            }
        }
        echo view('temp/haut');
        echo view('creerVote');
        echo view('temp/bas');
    }
    public function choixCreer($id)
    {
        $data = [];
        helper(['form']);
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'cho_nom' => 'required',
            ];
            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            }
        }
    }
}
