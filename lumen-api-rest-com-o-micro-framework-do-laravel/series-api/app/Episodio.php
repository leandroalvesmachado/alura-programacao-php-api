<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episodio extends Model
{
    public $timestamps = false;
    public $fillable = ['temporada', 'numero', 'assistido', 'serie_id'];
    protected $appends = ['links'];

    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }

    public function getAssistidoAttribute($value): bool
    {
        return $value;
    }

    public function getLinksAttribute(): array
    {
        return [
            'self' => '/api/episodios/'.$this->id,
            'serie' => '/api/series/'.$this->serie_id
        ];
    }
}