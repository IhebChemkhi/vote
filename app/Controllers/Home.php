<?php

namespace App\Controllers;

use App\Models\AppModel;
use App\Models\UserModel;
use App\Models\ChoixModel;
use App\Models\CustumModel;

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
                    if ($public['vote_etat'] == 'O')
                        return redirect()->to("home/votePublic/" . $public['vote_id']);
                    else
                        return
                            redirect()->to("home/voteResultatPublic/" . $public['vote_id']);
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
                // $idPrive = random_string('alnum', 16);
                // $idPublic = random_string('alnum', 16);
                $base = base_url();
                $model = new UserModel();
                $newData = [
                    'vote_question' => $this->request->getVar('question'),
                    'vote_etat' => 'O',
                    'vote_id' => null,
                    'vote_urlPublic' => '' . $base . '/home/votePublic/',
                    'vote_urlPrive' =>  '' . $base . '/home/votePrive/',
                ];
                $id = $model->insert($newData, true);
                $dataUpdate = [
                    'vote_urlPublic' => '' . $base . '/home/votePublic/' . $id,
                    'vote_urlPrive' =>  '' . $base . '/home/votePrive/' . $id,
                ];
                $model->update($id, $dataUpdate);
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
                $session->setFlashdata('success', 'Le vote a été crée.<br> Voici Le lien Privé : ' . $dataUpdate['vote_urlPrive'] . '<br> Voici le Lien public: ' . $dataUpdate['vote_urlPublic']);
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
        $appreciation = [];
        $model = new UserModel();
        $ChoixModel = new ChoixModel();
        $appModel = new AppModel();
        $data['question'] = $model->where('vote_id', $id)
            ->first();
        $data['choix'] = $ChoixModel->where('vote_id', $id)
            ->findall();
        if ($this->request->getMethod() == 'post') {
            foreach ($this->request->getPost() as $key => $value) {
                $appreciation[$key] = $value;
            }
            foreach ($appreciation as $key => $value) {
                $uneApp = [
                    'app_id' => null,
                    'app_choix' => $value,
                    'cho_id' => $key,
                ];
                $appModel->insert($uneApp);
            }
        }
        echo view('temp/haut', $data);
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
            $model->update($id, $newData);
        } else if ($data['etat']['vote_etat'] == 'F') {
            $newData = [
                'vote_etat' => 'O',
            ];
            $model->update($id, $newData);
        }
        return redirect()->to("home/votePrive/" . $id);
    }
    public function voteResultatPublic($id)
    {
        $model = new UserModel();
        $ChoixModel = new ChoixModel();
        // $appModel = new AppModel();
        $db = db_connect();
        $custum = new CustumModel($db);
        $choix = [];
        $data['question'] = $model->where('vote_id', $id)
            ->first();
        $data['choix'] = $ChoixModel->where('vote_id', $id)
            ->findall();
        foreach ($data['choix'] as $key) {
            $parfait = $custum->CountParfait($key['cho_id']);
            $tresBon = $custum->CountTresBon($key['cho_id']);
            $moyen = $custum->CountMoyen($key['cho_id']);
            $bon = $custum->Countbon($key['cho_id']);
            $mauvais = $custum->CountMauvais($key['cho_id']);
            $tresMauvais = $custum->CountTresMauvais($key['cho_id']);
            $rejeter = $custum->CountRejeter($key['cho_id']);
            $total = $parfait + $tresBon + $moyen + $bon + $mauvais + $tresMauvais + $rejeter;
            $res[$key['cho_id']]['parfait'] = ($parfait * 100) / $total;
            $res[$key['cho_id']]['tres bon'] = ($tresBon * 100) / $total;
            $res[$key['cho_id']]['bon'] = ($bon * 100) / $total;
            $res[$key['cho_id']]['moyen'] = ($moyen * 100) / $total;
            $res[$key['cho_id']]['mauvais'] = ($mauvais * 100) / $total;
            $res[$key['cho_id']]['tresMauvais'] = ($tresMauvais * 100) / $total;
            $res[$key['cho_id']]['rejeter'] = ($rejeter * 100) / $total;
            $choix[$key['cho_id']] = 0;
        }
        $gagnant = '';
        $options = [
            'parfait', 'tres bon', 'bon', 'moyen', 'mauvais', 'tresMauvais', 'rejeter'
        ];
        $nbGagnant = 0;
        $tabGagnant = [];
        $grandID= '';
        foreach ($options as $opt) {
            //printf($opt);
            foreach ($data['choix'] as $key) { // comparaison des parfaits
                $choix[$key['cho_id']] += $res[$key['cho_id']][$opt];
                if ($choix[$key['cho_id']] >= 50) {
                    $gagnant = $choix[$key['cho_id']];
                   // printf($gagnant . '-----------------------');
                    $tabGagnant[$nbGagnant] = $key['cho_id'];
                    $nbGagnant++;
                }
            }
            if ($nbGagnant > 0) {
                $tabCompMieux = [];
                foreach ($tabGagnant as $gagne) {
                    $tabCompMieux[$gagne][0] = $res[$gagne]['parfait'] + $res[$gagne]['tres bon'];
                    $tabCompMieux[$gagne][1] = $res[$gagne]['moyen'] + $res[$gagne]['mauvais'] + $res[$gagne]['tresMauvais'] + $res[$gagne]['rejeter'];
                }
                //print_r($tabCompMieux);
                
                $grandVal=50;
                foreach($tabCompMieux as $key=>$comp){
                    if ($comp[0]>=$grandVal){
                        $grandID = $key;
                    }
                    if ($comp[1]<=$grandVal){
                        $grandID = $key;
                    }
                }

                break;
            }
        }
        print_r($grandID);
        $data['gagnant'] = $ChoixModel->where('cho_id', $grandID)
        ->first();

        echo view('temp/haut', $data);
        echo view('resultatPublic');
        echo view('temp/bas');
    }
}
