<?php

declare(strict_types=1);

namespace App\Controllers;

class HomeController extends Controller
{
    public function index(): void
    {
        $this->view('home', [
            'name' => 'Fady El Gendy'
        ]);
    }
}