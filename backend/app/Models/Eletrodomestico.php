<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eletrodomestico extends Model
{
    protected $fillable = ['nome', 'descricao', 'tensao', 'marca'];
}
