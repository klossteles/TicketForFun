<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $primaryKey = 'slug';
    public $incrementing = false;

    protected $fillable = [
        'slug',
        'name',
        'original_name',
        'duration_in_minutes',
        'plot_summary',
        'image_url',
        'plot_summary',
    ];
}
