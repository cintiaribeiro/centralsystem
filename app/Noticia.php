<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    protected $filable = ['titulo', 'noticia'];

    /**
     * Criando relacionamento com o modelo user
     *
     * @return void
     */
    public function users()
    {
        $this->belongsTo('App\User');
    }
}
