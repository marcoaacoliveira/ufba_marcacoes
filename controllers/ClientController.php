<?php

class ClientController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->client = new Client();
    }
    public function store($params)
    {
        $client = new Client();
        $client->user_id = $params[0];
        if($client->save()){
            $this->redirect('animal/create/'+$client->id);
        }
    }

    public function index()
    {
        $clients = $this->client->findAll();
        echo $this->render(compact('clients'));
    }
}