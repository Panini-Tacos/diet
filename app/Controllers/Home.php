<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('pages/login');
    }

    public function dashboard(): string
    {
        return view('pages/dashboard');
    }

    public function traitementLogin()
    {
        return require APPPATH . 'traitements/traitement-login.php';
    }
}


