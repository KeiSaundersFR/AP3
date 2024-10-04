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

    public function ajout(){
        return view('ajout_client');
    }
}
