<?php

namespace App\Controllers;

class Client extends BaseController
{
    private $clientModel;

    public function __construct()
    {
        $this->clientModel = model('Client');
    }

    public function list(): string
    {
        $clients = $this->clientModel->findAll();
        return view('client/liste_clients.php', [
            'listeClients' => $clients
        ]);
    }

    public function ajout()
    {
        $user = auth()->user();
        if (!$user->inGroup('admin') && !$user->inGroup('commercial')) {
            // Redirige vers une page d'erreur personnalisée (par exemple page 403)
            return redirect()->route('list_mission')->with('message', 'Accès non autorisé. Utilisez un compte ayant les accès nécessaires.');
        } else
            return view('client/ajout_client');
    }

    public function create()
    {
        $user = auth()->user();
        if (!$user->inGroup('admin') && !$user->inGroup('commercial')) {
            // Redirige vers une page d'erreur personnalisée (par exemple page 403)
            return redirect()->route('list_mission')->with('message', 'Accès non autorisé. Utilisez un compte ayant les accès nécessaires.');
        } else {
            $clientData = $this->request->getPost();
            $this->clientModel->save($clientData);
            return redirect('page_client');
        }
    }

    public function modif($clientId): string
    {
        $user = auth()->user();
        if (!$user->inGroup('admin') && !$user->inGroup('commercial')) {
            // Redirige vers une page d'erreur personnalisée (par exemple page 403)
            return redirect()->route('list_mission')->with('message', 'Accès non autorisé. Utilisez un compte ayant les accès nécessaires.');
        } else {
            $client = $this->clientModel->find($clientId);

            return view('client/modif_client.php', [
                'client' => $client
            ]);
        }
    }

    public function update() // à finir
    {

        $user = auth()->user();
        if (!$user->inGroup('admin') && !$user->inGroup('commercial')) {
            // Redirige vers une page d'erreur personnalisée (par exemple page 403)
            return redirect()->route('list_mission')->with('message', 'Accès non autorisé. Utilisez un compte ayant les accès nécessaires.');
        } else {
            $clientData = $this->request->getPost();
            $this->clientModel->save($clientData);
            return redirect('page_client');
        }
    }

    public function suppr()
    {

        $user = auth()->user();
        if (!$user->inGroup('admin') && !$user->inGroup('commercial')) {
            // Redirige vers une page d'erreur personnalisée (par exemple page 403)
            return redirect()->route('list_mission')->with('message', 'Accès non autorisé. Utilisez un compte ayant les accès nécessaires.');
        } else {
            $clientData = $this->request->getPost();
            $this->clientModel->delete($clientData['ID_CLIENT']);

            return redirect('page_client');
        }
    }
}
