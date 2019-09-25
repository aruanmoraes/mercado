<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Cliente};
use DB;

class ClienteController extends Controller
{
    public function index()
    {
        $data = [
            'clientesAtivos' => Cliente::get(),
            'clientesInativos' => Cliente::onlyTrashed()->get()
        ];
        return view('clientes.index', compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $data = [
            'cliente' => '',
            'url' => 'clientes',
            'method' => 'POST',
        ];
        return view('clientes.form', compact('data'));
    }
}
