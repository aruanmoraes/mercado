<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Cliente, Produto, Compra};
use DB;

class CompraController extends Controller
{
    
        public function index($id) {
            $data = [
                'cliente' => Cliente::findOrFail($id)
            ];
           return view('compras.index', compact('data'));
           //return $data;
            
        }

        public function create() {
            $data = [
                'clientes' => Cliente::all(),
                'produtos' => Produto::all()
            ];
            return view('compras.form', compact('data'));
        }

        public function store(Request $request) {
            DB::beginTransaction();
            try {
            
                $compra = Compra::create([
                    'data' => $request['compra']['data'],
                    'cliente_id' => $request['compra']['cliente_id']
                ]);
             

                $compra->produto()->attach($request['produtos']);

                DB::commit();
                return redirect('clientes')->with('success', 'Compra realizado com sucesso!');
            } catch(\Exception $e) {
                DB::rollback();
                dd($e);
                return redirect('compras/create')->with('error', 'Erro no servidor! Compra não realizado!'); 
            }
        }
    
    
}
