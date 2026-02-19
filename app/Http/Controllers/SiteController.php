<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {

        $nome = 'Rafael';
        $habitos = [
            'Acordar cedo',
            'Fazer exercícios',
            'Ler um livro',
        ];
        return view('home',compact('nome', 'habitos'));
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}
