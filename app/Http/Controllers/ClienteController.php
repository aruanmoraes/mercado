<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Cliente};
use DB;
use App\Http\Requests\ClienteRequest;

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

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    
    public function store(ClienteRequest $request)
    {
        DB::beginTransaction();
        try {
            $cliente = Cliente::create([
                'nome' => $request['cliente']['nome']
            ]);
            
            DB::commit();
            return redirect('clientes')->with('success', 'Cliente cadastrado com sucesso!');
        } catch(\Exception $e) {
            DB::rollback();
            return redirect('clientes')->with('error', 'Erro no servidor! Cliente não cadastrado!');
        }
    }
 
    public function show($id)
    {
        //
    }
    
    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        $data = [
            'cliente' => $cliente,
            'url' => 'clientes/'.$id,
            'method' => 'PUT',
        ];
        return view('clientes.form', compact('data'));
    }
    
    public function update(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);
        DB::beginTransaction();
        try {
            $cliente->update([
                'nome' => $request['cliente']['nome']
            ]);
            
            DB::commit();
            return redirect('clientes')->with('success', 'Cliente atualizado com sucesso!');
        } catch(\Exception $e) {
            DB::rollback();
            return redirect('clientes')->with('error', 'Erro no servidor! Cliente não atualizado!');
        }
    }
   
    public function destroy($id)
    {
        $cliente = Cliente::withTrashed()->findOrFail($id);
        if($cliente->trashed()) {
            $cliente->restore();
            return back()->with('success', 'Cliente ativado com sucesso!');
        } else {
            $cliente->delete();
            return back()->with('success', 'Cliente desativado com sucesso!');
        }
    }
}
