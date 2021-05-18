<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    public $timestamps = false;
    public $fillable = ['nome'];
    protected $appends = ['links'];
    
    // definindo quantos items na paginacao
    // por padrao sao 15
    protected $perPage = 3;

    public function episodios()
    {
        return $this->hasMany(Episodio::class);
    }

    public function getLinksAttribute(): array
    {
        return [
            'self' => '/api/series/'.$this->id,
            'episodios' => '/api/series/'.$this->id.'/episodios'
        ];
    }
}
