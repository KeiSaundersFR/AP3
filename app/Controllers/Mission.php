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

    public function ajout()
    {
        $clients = $this->clientModel->findAll();
        return view('mission/ajout_mission', ['listeClient' => $clients]
    );
    }

    public function create()
    {
        $missionData = $this->request->getPost();
        // var_dump($missionData);
        // die();
        $this->missionModel->save($missionData);
        return redirect('list_mission');
    }

    public function modif($missionId): string
    {
        $mission = $this->missionModel->find($missionId);
        return view('mission/modif_mission', [
            'mission' => $mission
        ]);
    }

    public function update()
    {
        $missionData = $this->request->getPost();
        $this->missionModel->save($missionData);
        return redirect('list_mission');
    }

    public function suppr()
    {
        $missionData = $this->request->getPost();
        $this->missionModel->delete($missionData['ID_MISSION']);
        return redirect('list_mission');
    }
}
