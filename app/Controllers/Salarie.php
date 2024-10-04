<?php

namespace App\Controllers;

class Salarie extends BaseController
{
    private $salarieModel;

    public function __construct()
    {
        $this->salarieModel = new ('Salarie');
    }

    public function list(): string
    {
        $salaries = $this->salarieModel->findAll();
        return view('salarie/list_salarie', [
            'listSalarie' => $salaries
        ]);
    }

    public function ajout(): string
    {
        return view('salarie/ajout_salarie');
    }

    public function modif($salarieId): string
    {
        $salarie_update = $this->salarieModel->find($salarieId);

        return view('salarie/update_salarie', [
            'salarie' => $salarie_update
        ]);
    }

    // public function delete($etudiantId): //RedirectResponse
    // {
    //     //return redirect('salarie/list_salarie');
    //     // return ('Suppr étudiant id=' . $etudiantId);
    // }
}
