<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Produto, Compra, Cliente};

class HomeController extends Controller
{
    public function index() {
        $data = [
            'clientes' => Cliente::count(),
            'produtos' => Produto::count(),
            'compras' => Compra::count()
        ];
        return view('home', compact('data'));
    }
}

