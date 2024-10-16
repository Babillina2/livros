<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $fillable = [
        'id',
        'data',
        'nome_comprador',
        'tipo_pgto',
        'qtd_parcelas',
        'desconto',
        'vl_liquido'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function itensVenda()
    {
        return $this->hasMany(ItemVenda::class);
    }
}
