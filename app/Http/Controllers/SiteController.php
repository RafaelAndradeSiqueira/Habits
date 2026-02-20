<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

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
        $habits = Auth::user()->habits;

        return view('dashboard', compact('habits'));
    }
}
