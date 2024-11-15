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

    public function create()
    {

        $user = auth()->user();
        if (!$user->inGroup('admin') && !$user->inGroup('commercial')) {
            // Redirige vers une page d'erreur personnalisée (par exemple page 403)
            return redirect()->route('list_mission')->with('message', 'Accès non autorisé. Utilisez un compte ayant les accès nécessaires.');
        } else {
            $salarieData = $this->request->getPost();
            $this->salarieModel->save($salarieData);
            return redirect('page_salarie');
        }
    }

    public function modif($salarieId): string
    {

        $user = auth()->user();
        if (!$user->inGroup('admin') && !$user->inGroup('commercial')) {
            // Redirige vers une page d'erreur personnalisée (par exemple page 403)
            return redirect()->route('list_mission')->with('message', 'Accès non autorisé. Utilisez un compte ayant les accès nécessaires.');
        } else {
            $salarie_update = $this->salarieModel->find($salarieId);

            return view('salarie/modif_salarie', [
                'salarie' => $salarie_update
            ]);
        }
    }

    public function update()
    {
        $user = auth()->user();
        if (!$user->inGroup('admin') && !$user->inGroup('commercial')) {
            // Redirige vers une page d'erreur personnalisée (par exemple page 403)
            return redirect()->route('list_mission')->with('message', 'Accès non autorisé. Utilisez un compte ayant les accès nécessaires.');
        } else {
        $salarieData = $this->request->getPost();
        $this->salarieModel->save($salarieData);
        return redirect('page_salarie');
        }
    }

    public function delete()
    {
        $user = auth()->user();
        if (!$user->inGroup('admin') && !$user->inGroup('commercial')) {
            // Redirige vers une page d'erreur personnalisée (par exemple page 403)
            return redirect()->route('list_mission')->with('message', 'Accès non autorisé. Utilisez un compte ayant les accès nécessaires.');
        } else {
        $salarieData = $this->request->getPost();
        $this->salarieModel->delete($salarieData['ID_SALARIE']);
        return redirect('page_salarie');
        }
    }
}
