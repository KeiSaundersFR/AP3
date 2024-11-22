<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $user = auth()->user();
        $admin = $user && $user->inGroup('admin','commercial','ressourcehumaine');

        return view('list_mission',[
            'admin' => $admin,
        ]);
    }
}
