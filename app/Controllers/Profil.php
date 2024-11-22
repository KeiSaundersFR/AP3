<?php

namespace App\Controllers;

class Profil extends BaseController
{
    private $profilModel;

    public function __construct()
    {
        $this->profilModel = model('Profil');

    }

    public function list(): string
    {
        $profils = $this->profilModel->findAll();
        return view('profil/liste_profils.php', [
            'listeProfils' => $profils
        ]);
    }

    public function ajout()
    {
        $user = auth()->user();
        if (!$user->inGroup('admin') && !$user->inGroup('commercial')) {
            // Redirige vers une page d'erreur personnalisée (par exemple page 403)
            return redirect()->route('list_mission')->with('message', 'Accès non autorisé. Utilisez un compte ayant les accès nécessaires.');
        } else {
            return view('profil/ajout_profil');
        }
    }

    public function create()
    {
        $user = auth()->user();
        if (!$user->inGroup('admin') && !$user->inGroup('commercial')) {
            // Redirige vers une page d'erreur personnalisée (par exemple page 403)
            return redirect()->route('list_mission')->with('message', 'Accès non autorisé. Utilisez un compte ayant les accès nécessaires.');
        } else {
            $profilData = $this->request->getPost();
            $this->profilModel->save($profilData);
            return redirect('page_profil');
        }
    }

    //faire modifier profil suppr et ajouter étant déjà fait (Bastian et Paul)

    public function suppr()
    {
        $user = auth()->user();
        if (!$user->inGroup('admin') && !$user->inGroup('commercial')) {
            // Redirige vers une page d'erreur personnalisée (par exemple page 403)
            return redirect()->route('list_mission')->with('message', 'Accès non autorisé. Utilisez un compte ayant les accès nécessaires.');
        } else {
        $profilData = $this->request->getPost();
        $this->profilModel->delete($profilData['ID_PROFIL']);

        return redirect('page_profil');
        }
    }
}
