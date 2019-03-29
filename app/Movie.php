<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $primaryKey = 'slug';
    public $incrementing = false;

    protected $fillable = [
        'name',
        'plot_summary',
    ];
}
