<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['serie', 'valor', 'descricao'];

    public function itensVenda()
    {
        return $this->hasMany(ItemVenda::class);
    }
}
