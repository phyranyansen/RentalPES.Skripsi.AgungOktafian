<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Google_Client;

class Login extends BaseController
{

    protected $googleClient;

    public function __construct()
    {
        $this->googleClient = new Google_Client();
        //--------------------------------------------
        $this->googleClient->setClientId('673961797078-og7012uh5mtki1trn0big7cqh6bl0bug.apps.googleusercontent.com');
        $this->googleClient->setClientSecret('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');
        $this->googleClient->setRedirectUri('http://localhost/rent/login-proses');
        $this->googleClient->addScope('email');
        $this->googleClient->addScope('profile'); 
    }


    public function index()
    {
        //
    }
}