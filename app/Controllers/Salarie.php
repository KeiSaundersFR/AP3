<?php

namespace App\Controllers;

class Salarie extends BaseController
{
    private $salarieModel;

    public function __construct()
    {
        $this->salarieModel = model('Salarie');
    }

    public function list(): string
    {
        $salaries = $this->salarieModel->findAll();
        return view('salarie/liste_salaries.php', [
            'listeSalaries' => $salaries
        ]);
    }

    public function ajout(): string
    {
        return view('salarie/ajout_salarie.php');
    }

    public function create(){

        $salarieData = $this->request->getPost();
        $this->salarieModel->save($salarieData);
        return redirect('page_salarie');
    }

    public function modif($salarieId): string
    {
        $salarie_update = $this->salarieModel->find($salarieId);

        return view('salarie/modif_salarie', [
            'salarie' => $salarie_update
        ]);
    }

    public function update(){

        $salarieData= $this->request->getPost();
        $this->salarieModel->save($salarieData);
        return redirect('list_salarie');
    }

    public function delete($salarieId)
    {
        return redirect('salarie/list_salarie');
        //return ('Suppr étudiant id=' . $etudiantId);
    }
}
