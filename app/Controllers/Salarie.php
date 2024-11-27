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

    public function create(){

        $user = auth()->user();
        if (!$user->inGroup('admin') && !$user->inGroup('ressourcehumaine')) {
            // Redirige vers une page d'erreur personnalisée (par exemple page 403)
            return redirect()->route('list_mission')->with('message', 'Accès non autorisé. Utilisez un compte ayant les accès nécessaires.');
        }
        else {
            $salarieData = $this->request->getPost();
            $this->salarieModel->save($salarieData);
            // var_dump($salarieData);
            // die();
            $idSalarie = $this->salarieModel->getInsertID();

            $listProfil = $this->request->getPost('profils[]');

            foreach ($listProfil as $idProfil) {
                $this->salarieModel->addProfil($idSalarie, $idProfil);
            }

            // var_dump($salarieData);
            // var_dump($idSalarie);
            // var_dump($listProfil);
            // return redirect('page_salarie');
        }
    }

    public function modif($salarieId): string
    {
        $user = auth()->user();
        if (!$user->inGroup('admin') && !$user->inGroup('ressourcehumaine')) {
            // Redirige vers une page d'erreur personnalisée (par exemple page 403)
            return redirect()->route('list_mission')->with('message', 'Accès non autorisé. Utilisez un compte ayant les accès nécessaires.');
        } else {
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
    }

    public function update()
    {
        $user = auth()->user();
        if (!$user->inGroup('admin') && !$user->inGroup('ressourcehumaine')) {
            // Redirige vers une page d'erreur personnalisée (par exemple page 403)
            return redirect()->route('list_mission')->with('message', 'Accès non autorisé. Utilisez un compte ayant les accès nécessaires.');
        } else {
            $salarieData = $this->request->getPost();

            // var_dump($salarieData);
            // var_dump($salarieFiles);
            // die();
            $this->salarieModel->save($salarieData);
            return redirect('page_salarie');
        }
    }

    public function suppr()
    {
        $user = auth()->user();
        if (!$user->inGroup('admin') && !$user->inGroup('ressourcehumaine')) {
            // Redirige vers une page d'erreur personnalisée (par exemple page 403)
            return redirect()->route('list_mission')->with('message', 'Accès non autorisé. Utilisez un compte ayant les accès nécessaires.');
        } else {
            $salarieData = $this->request->getPost(['ID_SALARIE']);
            $this->salarieModel->deleteProfilsSalarie($salarieData);
            $this->salarieModel->delete($salarieData);
            return redirect('page_salarie');
        }
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
