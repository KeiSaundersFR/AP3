<?php

namespace App\Controllers;

class Mission extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }
}
