<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string slug
 * @property string name
 * @property string original_name
 * @property int duration_in_minutes
 * @property string plot_summary
 * @property string image_url
 */
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
    ];
}
