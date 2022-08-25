<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Country extends Model
{
    protected $table= "countries";
    protected $primaryKey ="country_id";
    use HasFactory;

    //relacion de 1:M siempre se utiliza hasMany
    //relacion de M:1 siempre se utiliza belongsTo
    public function region(){
        //hasMany: Parametros
        //1 modelo a relacionar
        //FK del modelo actual en el modelo a relacionar
        return $this->BelongsTo(Region::class, 'country_id' );
    }
    public function idiomas(){
        //belongsToMany Prametros
        //1 modelo a relacionar
        //2 la tabla pivote
        //3 FK de el modelo actual del pivote
        //4 FK del modelo a relacionar en el pivote
        return $this->belongsToMany(Language::class, "country_languages", "country_id", "language_id")->withPivot('official');
    }
}
