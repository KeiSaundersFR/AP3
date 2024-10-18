<?php

namespace App\Controllers;

class Mission extends BaseController
{
    private $missionModel;

    public function __construct()
    {
        $this->missionModel = model('Mission');
    }

    public function list(): string
    {
        $missions = $this->missionModel-> findAll();
        return view('mission/liste_missions.php', [
            'listeMissions' => $missions
        ]);
    }

    public function ajout()
    {
        return view('mission/ajout_mission');
    }

    public function create()
    {
        $missionData = $this -> request -> getPost();
        $this -> missionModel -> save($missionData);
        return redirect('list_mission');
    }

    public function modif($missionId): string
    {
        $mission = $this ->missionModel->find($missionId);
        return view('mission/modif_mission',[
            'mission' => $mission
        ]);
    }

    public function update()
    {
        $missionData = $this->request -> getPost();
        $this->missionModel->save($missionData);
        return redirect('list_mission');
    }
}
