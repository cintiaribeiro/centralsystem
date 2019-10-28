<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    protected $fillable = ['titulo', 'noticia'];

    /**
     * Criando relacionamento com o modelo user
     *
     * @return void
     */
    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
