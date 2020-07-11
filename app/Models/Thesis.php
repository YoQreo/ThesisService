<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Thesis extends Model 
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 
        'clasification',
        'title',
        'year',
        'school_id',
        'stand_id',
        'adviser',
        'extension',
        'observations',
        'accompaniment',
        'content',
        'summary',
        'recomendations',
        'conclusions',
        'bibliography',
        'keywords',
        'mention'
    ];

    public function copies()
    {
        return $this->hasMany('App\Models\ThesisCopy','thesis_id');
    }
}
