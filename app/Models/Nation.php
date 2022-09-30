<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nation extends Model
{
    use HasFactory;
    protected $fillable = ['nation_name', 'nation_img', 'nation_icon', 'nation_map', 'nation_describe', 'population', 'area', 'language', 'currency', 'weather', 'timezone', 'weather_describe', 'weather_img'];
}
