<?php

namespace App\Controllers;

class Salarie extends BaseController
{
    private $salarieModel;
    private $profilModel;

    public function __construct()
    {
        $this->salarieModel = model('Salarie');
        $this->profilModel = model('Profil');
    }

    public function list()
    {
        $listSalaries = $this->salarieModel->findAll();
        // var_dump($listSalarie);

        $profilsSalarie = [];

        foreach ($listSalaries as $salarie) {
            $profilsSalarie[] = $this->salarieModel->getProfil($salarie['ID_SALARIE']);
        }
        // var_dump($profilsSalarie);
        // var_dump($idSalarie);
        // var_dump($profilsSalarie);
        return view('salarie/liste_salaries.php', [
            'listeSalaries' => $listSalaries,
        'profilsSalarie' => $profilsSalarie,
        ]);
    }

    public function ajout(): string
    {
        $profils = $this->profilModel->findAll();
        return view(
            'salarie/ajout_salarie.php',
            [
                'listeProfil' => $profils
            ]
        );
    }

    public function create()
    {

        $salarieData = $this->request->getPost();
        $this->salarieModel->save($salarieData);

        $idSalarie = $this->salarieModel->getInsertID();

        $listProfil = $this->request->getPost('profils[]');

        foreach ($listProfil as $idProfil) {
            $this->salarieModel->addProfil($idSalarie, $idProfil);
        }

        // var_dump($salarieData);
        // var_dump($idSalarie);
        // var_dump($listProfil);
        // die();
        return redirect('page_salarie');
    }

    public function modif($salarieId)
    {
        $salarie = $this->salarieModel->find($salarieId);
        $idSalarie = $salarie['ID_SALARIE'];
        $profilsSalarie = $this->salarieModel->getProfil($salarieId);
        $listNonProfilSalarie = $this->profilModel->getProfilsNotSalarie($idSalarie);
        // var_dump($salarie);
        // var_dump($idSalarie);

        // var_dump($listNonProfilSalarie);
        // die();

        return view('salarie/modif_salarie', [
            'salarie' => $salarie,
            'profilsSalarie' => $profilsSalarie,
            'listNonProfilSalarie' => $listNonProfilSalarie
        ]);
    }

    public function update()
    {

        $salarieData = $this->request->getPost();

        // var_dump($salarieData);
        // var_dump($salarieFiles);
        // die();
        $this->salarieModel->save($salarieData);
        return redirect('page_salarie');
    }

    public function suppr()
    {
        $salarieData = $this->request->getPost(['ID_SALARIE']);
        $this->salarieModel->deleteProfilsSalarie($salarieData);
        $this->salarieModel->delete($salarieData);
        return redirect('page_salarie');
    }

    public function ajoutProfil()
    {
        $idProfil = $this->request->getPost('ID_PROFIL');
        $idSalarie = $this->request->getPost('ID_SALARIE');
        // var_dump($idProfil);
        // var_dump($nbrProfil);
        // var_dump($idMission);
        // die();
        $this->salarieModel->addProfil($idSalarie, $idProfil);

        return redirect()->to(url_to("modif_salarie", $idSalarie));
    }

    public function supprProfil()
    {
        $data = $this->request->getPost();
        $idSalarie = $this->request->getPost('ID_SALARIE');
        $idProfil = $this->request->getPost('ID_PROFIL');
        $this->salarieModel->deleteProfilSalarie($idSalarie, $idProfil);
        // var_dump($data);
        // var_dump($idMission);
        // var_dump($idProfil);
        // die();
        return redirect()->to(url_to("modif_salarie", $idSalarie));
    }
}
