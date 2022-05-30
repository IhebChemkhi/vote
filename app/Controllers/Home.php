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
        $choix = [];
        helper(['form']);
        if ($this->request->getMethod() == 'post') {

            // recupere les choix
            foreach ($this->request->getPost() as $key => $value) {
                if ($key != 'question') {
                    $choix[$key] = $value;
                }
            }
            print_r($choix);
            // print_r($this->request->getVar());
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
                    'vote_id' => null,
                    'vote_urlPublic' => "tesdazeaz",
                    'vote_urlPrive' => "teetzeaze",
                ];
                $id = $model->insert($newData, true);
                foreach($choix as $key => $value){
                    $unChoix = [
                        'cho_id' => null,
                        'cho_nom' => $value,
                        'vote_id' => $id,
                    ];
                    $model->insert($unChoix);
                }
                // printf($id);
                $session = session();
                $session->setFlashdata('success', 'vote crée');
                // return redirect()->to("home/voteCreer");
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
