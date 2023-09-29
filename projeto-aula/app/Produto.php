<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'tbProduto';

    protected $fillable= ['idProduto','produto','descrProduto','valor','dtCadastro'];

    public $timestamps = false;
}
