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
        return view('client/ajout_client');
    }
    
    public function create(){
        $data = [
            'RAISON_SOCIAL' => $this->request->GetPost("raison social"),
            'CONTACT' => $this->request->GetPost("contact"),
            'EMAIL_CLIENT' => $this->request->GetPost("email_client"),
            'NUM_TELEPHONE_CLIENT' => $this->request->GetPost("telephone"),
            'ADRESSE_CLIENT' => $this->request->GetPost("adresse"),
            'CODE_POSTAL_CLIENT' => $this->request->GetPost("code_postal"),
            'VILLE_CLIENT' => $this->request->GetPost("ville"),
            'PHOTO_CLIENT' => $this->request->GetPost("profil"),
        ];

        $this->clientModel->save($data);
        return redirect('page_client');
    }
    
    public function modif($clientId): string
    {
        $client = $this->clientModel->find($clientId);

        return view('client/modif_client.php', [
            'client' => $client
        ]);
    }

    public function update() // à finir
    {
        $data = [
            'id' => $this->request->GetPost("id"),
            'RAISON_SOCIAL' => $this->request->GetPost("raison social"),
            'CONTACT' => $this->request->GetPost("contact"),
            'EMAIL_CLIENT' => $this->request->GetPost("email_client"),
            'NUM_TELEPHONE_CLIENT' => $this->request->GetPost("telephone"),
            'ADRESSE_CLIENT' => $this->request->GetPost("adresse"),
            'CODE_POSTAL_CLIENT' => $this->request->GetPost("code_postal"),
            'VILLE_CLIENT' => $this->request->GetPost("ville"),
            'PHOTO_CLIENT' => $this->request->GetPost("profil"),
        ];

        $this->clientModel->save($data);
        return redirect('page_client');
    }
}
