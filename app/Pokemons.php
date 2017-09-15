<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pokemons extends Model
{
    //
    protected $fillable = ['nome', 'tipo_de_pokemon', 'pode_de_ataque', 'pode_de_defesa', 'agilidade'];

    protected $dates = ['deleted_at'];

}
