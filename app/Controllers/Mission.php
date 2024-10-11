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
}
