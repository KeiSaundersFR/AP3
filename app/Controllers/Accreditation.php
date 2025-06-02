<?php

namespace App\Controllers;

class Accreditation extends BaseController
{
    private $accreditationModel;
    private $profilModel;

    public function __construct()
    {
        $this->accreditationModel = model('Accreditation');
        $this->profilModel = model('Profil');
    }

    private function isAuthorized(): bool
    {
        $user = auth()->user();
        return $user->inGroup('admin') || $user->inGroup('rhu');
    }

    public function list_accreditation()
{
    if (!$this->isAuthorized()) {
        return redirect()->route('list_salarie');
    }

    // Récupération des salariés avec une accréditation
    $listSalaries = $this->accreditationModel->where('ACCREDITATION', 1)->findAll();

    $profilsSalarie = [];
    foreach ($listSalaries as $salarie) {
        $profilsSalarie[] = $this->accreditationModel->getProfil($salarie['ID_SALARIE']);
    }

    return view('salarie/liste_salaries.php', [
        'listeSalaries' => $listSalaries,
        'profilsSalarie' => $profilsSalarie,
    ]);
    }

    public function ajoutAccreditation()
    {
        if (!$this->isAuthorized()) {
            return redirect()->route('list_accreditation');
        }
        $profils = $this->profilModel->findAll();
        return view(
            'salarie/ajout_accreditation.php',
            [
                'listeProfil' => $profils
            ]
        );
    }

    public function createAccreditation()
    {
        if (!$this->isAuthorized()) {
            return redirect()->route('list_accreditation');
        }
        // Logique pour créer une accréditation
    }

    // Autres méthodes pour gérer les accréditations...
}