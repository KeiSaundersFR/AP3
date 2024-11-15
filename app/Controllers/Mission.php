<?php

namespace App\Controllers;

use App\Models\Client;

class Mission extends BaseController
{
    private $missionModel;
    private $clientModel;

    public function __construct()
    {
        $this->missionModel = model('Mission');
        // $this->missionModel = new Mission();
        $this->clientModel = model('Client');
        // $this->clientModel = new Client();
    }

    public function list(): string
    {
        $missions = $this->missionModel->findJoinAll();
        return view('mission/liste_missions.php', [
            'listeMissions' => $missions
        ]);
    }

    public function mission($missionId)
    {
        $mission = $this->missionModel->find($missionId);
        return view('mission/gestion_mission', [
            'mission' => $mission
        ]);
    }

    public function ajout()
    {

        $user = auth()->user();
        if (!$user->inGroup('admin') && !$user->inGroup('commercial')) {
            // Redirige vers une page d'erreur personnalisée (par exemple page 403)
            return redirect()->route('list_mission')->with('message', 'Accès non autorisé. Utilisez un compte ayant les accès nécessaires.');
        } else {
            $clients = $this->clientModel->findAll();
            return view(
                'mission/ajout_mission',
                ['listeClient' => $clients]
            );
        }
    }

    public function create()
    {
        $user = auth()->user();
        if (!$user->inGroup('admin') && !$user->inGroup('commercial')) {
            // Redirige vers une page d'erreur personnalisée (par exemple page 403)
            return redirect()->route('list_mission')->with('message', 'Accès non autorisé. Utilisez un compte ayant les accès nécessaires.');
        } else {
            $missionData = $this->request->getPost();
            $this->missionModel->save($missionData);
            return redirect('list_mission');
        }
    }

    public function modif($missionId): string
    {

        $user = auth()->user();
        if (!$user->inGroup('admin') && !$user->inGroup('commercial')) {
            // Redirige vers une page d'erreur personnalisée (par exemple page 403)
            return redirect()->route('list_mission')->with('message', 'Accès non autorisé. Utilisez un compte ayant les accès nécessaires.');
        } else {
            $mission = $this->missionModel->find($missionId);
            return view('mission/modif_mission', [
                'mission' => $mission
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
            $missionData = $this->request->getPost();
            $this->missionModel->save($missionData);
            return redirect('list_mission');
        }
    }

    public function suppr()
    {
        $user = auth()->user();
        if (!$user->inGroup('admin') && !$user->inGroup('commercial')) {
            // Redirige vers une page d'erreur personnalisée (par exemple page 403)
            return redirect()->route('list_mission')->with('message', 'Accès non autorisé. Utilisez un compte ayant les accès nécessaires.');
        } else {
            $missionData = $this->request->getPost();
            $this->missionModel->delete($missionData['ID_MISSION']);
            return redirect('list_mission');
        }
    }
}
