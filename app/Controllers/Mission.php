<?php

namespace App\Controllers;

class Mission extends BaseController
{
    public function list(): string
    {
        return view('mission/liste_missions.php');
    }
}
