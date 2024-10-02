<?php

namespace App\Controllers;

class Mission extends BaseController
{
    public function list(): string
    {
        return view('liste_missions.php');
    }
}
