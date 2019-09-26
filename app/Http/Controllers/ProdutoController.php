<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProdutoRequest;
use App\{Produto, Compra};
use DB;

class ProdutoController extends Controller
{
    public function index()
    {
        $data = [
            'produtosAtivos' => Produto::get(),
            'produtosInativos' => Produto::onlyTrashed()->get()
        ];
        return view('produtos.index', compact('data'));
    }

    public function create()
    {
       $data = [
            'produto' => '',
            'url' => 'produtos',
            'method' => 'POST',
        ];
        return view('produtos.form', compact('data'));
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    
    public function store(ProdutoRequest $request)
    {
        DB::beginTransaction();
        try {
            $produto = Produto::create([
                'nome' => $request['produto']['nome'],
                'valor' => $request['produto']['valor']
            ]);
            
            DB::commit();
            return redirect('produtos')->with('success', 'produto cadastrado com sucesso!');
        } catch(\Exception $e) {
            DB::rollback();
            return redirect('produtos')->with('error', 'Erro no servidor! produto não cadastrado!');
        }
    }
 
    public function show($id)
    {
        //
    }
    
    public function edit($id)
    {
        $produto = Produto::findOrFail($id);
        $data = [
            'produto' => $produto,
            'url' => 'produtos/'.$id,
            'method' => 'PUT',
        ];
        return view('produtos.form', compact('data'));
    }
    
    public function update(Request $request, $id)
    {
        $produto = Produto::findOrFail($id);
        DB::beginTransaction();
        try {
            $produto->update([
                'nome' => $request['produto']['nome'],
                'valor' => $request['produto']['valor']
            ]);
            
            DB::commit();
            return redirect('produtos')->with('success', 'produto atualizado com sucesso!');
        } catch(\Exception $e) {
            DB::rollback();
            return redirect('produtos')->with('error', 'Erro no servidor! produto não atualizado!');
        }
    }
   
    public function destroy($id)
    {
        $produto = Produto::withTrashed()->findOrFail($id);
        if($produto->trashed()) {
            $produto->restore();
            return back()->with('success', 'produto ativado com sucesso!');
        } else {
            $produto->delete();
            return back()->with('success', 'produto desativado com sucesso!');
        }
    }
}
