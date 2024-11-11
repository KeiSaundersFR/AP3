<?php

namespace App\Controllers;

use App\Models\Client;

class Mission extends BaseController
{
    private $missionModel;
    private $clientModel;
    private $profilModel;

    public function __construct()
    {
        $this->missionModel = model('Mission');
        // $this->missionModel = new Mission();
        $this->clientModel = model('Client');
        // $this->clientModel = new Client();
        $this->profilModel = model('Profil');
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
        $client = $this->clientModel->find($mission['ID_CLIENT']);
        $profilsMission = $this->missionModel->getProfil($missionId);
        // foreach($profilsMission as $profilMission)
        // {
        //     $profils = $this->profilModel->findAll($profilMission['ID_PROFIL']);
        // }
        $profilIds = [];
        foreach ($profilsMission as $profilMission) {
            $profilIds[] = $profilMission['ID_PROFIL'];
        }

        $profils = [];
        if (!empty($profilIds)) {
            $profils = $this->profilModel->whereIn('ID_PROFIL', $profilIds)->findAll();
        }
        // var_dump($mission);
        // var_dump($client);
        // var_dump($profilsMission);
        // var_dump($profils);
        // die();
        return view('mission/gestion_mission', [
            'mission' => $mission,
            'client' => $client,
            'profilsMission' => $profilsMission
        ]);
    }

    public function modif($missionId): string
    {
        $mission = $this->missionModel->find($missionId);
        $client = $this->clientModel->find($mission['ID_CLIENT']);
        $listeClient = $this->clientModel->findAll();
        // $listeProfil = $this->profilModel->findAll();
        $profilsMission = $this->missionModel->getProfil($missionId);

        $profilIds = [];
        foreach ($profilsMission as $profilMission) {
            $profilIds[] = $profilMission['ID_PROFIL'];
        }

        // var_dump($mission);
        // var_dump($client);
        // var_dump($listeClient);
        // var_dump($profilsMission);
        // die();

        return view('mission/modif_mission', [
            'mission' => $mission,
            'client' => $client,
            'listeClient' => $listeClient,
            'profilsMission' => $profilsMission
        ]);
    }

    public function ajout()
    {
        $clients = $this->clientModel->findAll();
        $profils = $this->profilModel->findAll();
        return view(
            'mission/ajout_mission',
            [
                'listeClient' => $clients,
                'listeProfil' => $profils
            ]
        );
    }

    public function create()
    {
        $missionData = $this->request->getPost();
        $this->missionModel->save($missionData);

        // récupération du dernier ID inséré
        $idMission = $this->missionModel->getInsertID();

        // récupération de la liste des profils
        $listProfil = $this->request->getPost('profils[]');

        // parcour la liste de profils de la mission
        foreach ($listProfil as $idProfil) {
            // récupération du nombre par profil courrant
            $nbre = $this->request->getPost($idProfil);
            $this->missionModel->addProfil($idMission, $idProfil, $nbre);
        }
        return redirect('list_mission');
    }


    public function update()
    {
        $missionData = $this->request->getPost();
        $this->missionModel->save($missionData);

        $idMission = $this->request->getPost(['ID_MISSION']);

        $listProfil = $this->request->getPost('ID_PROFIL[]');

        foreach ($listProfil as $idProfil) {
            $nbre = $this->request->getPost($idProfil);
            $this->missionModel->updateProfil($idMission, $idProfil, $nbre);
        }
        // var_dump($missionData);
        return redirect('list_mission');
    }

    public function suppr()
    {
        $missionData = $this->request->getPost();
        $this->missionModel->delete($missionData['ID_MISSION']);
        return redirect('list_mission');
    }

    public function attribution()
    {

        return redirect('');
    }
    public function affect()
    {

        return redirect('');
    }
}
