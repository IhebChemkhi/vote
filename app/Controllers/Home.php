<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ChoixModel;

class Home extends BaseController
{
    public function index()
    {
        $data = [];
        helper(['form', 'text']);
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'lien' => 'required',
            ];
            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $lien = $this->request->getVar('lien');
                $model = new UserModel();
                $public = $model->where('vote_urlPublic', $lien)
                    ->first();
                $prive = $model->where('vote_urlPrive', $lien)
                    ->first();

                if ($public != null)
                    return redirect()->to("home/votePublic/" . $public['vote_id']);
                else if ($prive != null)
                    return redirect()->to("home/votePrive/" . $prive['vote_id']);
                else
                    return redirect()->to("home/index/");
            }
        }
        echo view('temp/haut');
        echo view('votePage');
        echo view('temp/bas');
    }

    public function voteCreer()
    {
        $data = [];
        $choix = [];
        helper(['form', 'text']);

        if ($this->request->getMethod() == 'post') {

            // recupere les choix
            foreach ($this->request->getPost() as $key => $value) {
                if ($key != 'question') {
                    $choix[$key] = $value;
                }
            }

            $rules = [
                'question' => 'required',
            ];
            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $idPrive = random_string('alnum', 16);
                $idPublic = random_string('alnum', 16);
                $base = base_url();
                $model = new UserModel();
                $newData = [
                    'vote_question' => $this->request->getVar('question'),
                    'vote_etat' => 'O',
                    'vote_id' => null,
                    'vote_urlPublic' => '' . $base . '/home/votePublic/' . $idPublic,
                    'vote_urlPrive' =>  '' . $base . '/home/votePrive/' . $idPrive,
                ];
                $id = $model->insert($newData, true);
                $modelChoix = new ChoixModel();
                foreach ($choix as $key => $value) {
                    $unChoix = [
                        'cho_id' => null,
                        'cho_nom' => $value,
                        'vote_id' => $id,
                    ];
                    $modelChoix->insert($unChoix);
                }
                $session = session();
                $session->setFlashdata('success', 'Le vote a été crée.<br> Voici Le lien Privé : ' . $newData['vote_urlPrive'] . '<br> Voici le Lien public: ' . $newData['vote_urlPublic']);
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

    public function votePrive($id)
    {
        $data = [];
        helper(['form', 'text']);
        $model = new UserModel();
        $ChoixModel = new ChoixModel();
        $data['question'] = $model->where('vote_id', $id)
            ->findall();
        $data['choix'] = $ChoixModel->where('vote_id', $id)
            ->findall();
        echo view('temp/haut', $data);
        echo view('votePrive');
        echo view('temp/bas');
    }
    public function votePublic($id)
    {
        helper(['form', 'text']);
        $data = [];
        $model = new UserModel();
        $ChoixModel = new ChoixModel();
        $data['question'] = $model->where('vote_id', $id)
            ->first();
        $data['choix'] = $ChoixModel->where('vote_id', $id)
            ->findall();
        echo view('temp/haut',$data);
        echo view('votePublic');
        echo view('temp/bas');
    }

    public function changerEtat($id)
    {
        $data = [];
        helper(['form', 'text']);
        $model = new UserModel();
        $data['etat'] = $model->where('vote_id', $id)
            ->first();
        if ($data['etat']['vote_etat'] == 'O') {
            $newData = [
                'vote_etat' => 'F',
            ];
            $model->update($id,$newData);
        } else if ($data['etat']['vote_etat'] == 'F') {
            $newData = [
                'vote_etat' => 'O',
            ];
            $model -> update($id,$newData);
        }
        return redirect()->to("home/votePrive/" . $id);
    }
}
