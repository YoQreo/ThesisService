<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThesisCopy extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'incomeNumber', 
        'barcode',
        'copy',
        'status',
        'thesis_id'
    ];
    public function thesis()
    {
        return $this->belongsTo('App\Models\Thesis','thesis_id');
    }

    
}
