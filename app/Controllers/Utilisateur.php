<?php

namespace App\Controllers;

class Utilisateur extends BaseController
{
    public function index(): string
    {
        $user = auth()->user();
        if (!$user->inGroup('admin') && !$user->inGroup('commercial')) {
            // Redirige vers une page d'erreur personnalisée (par exemple page 403)
            return redirect()->route('list_mission')->with('message', 'Accès non autorisé. Utilisez un compte ayant les accès nécessaires.');
        } else {
        return view('welcome_message');
        }
    }
}
