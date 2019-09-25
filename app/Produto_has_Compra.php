<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto_has_Compra extends Model
{
    use SoftDeletes;
    protected $table = 'Produto_has_Compra';

    protected $fillable = ['produto_id','compra_id','quantidade'];
    
    //Relacionamentos
    public function compra() {
        return $this->belongsTo('App\Compra');   
    }
}
