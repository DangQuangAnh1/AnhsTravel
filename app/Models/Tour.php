<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;
    protected $fillable = ['tour_name', 'tour_img', 'tour_city', 'style_name', 'nation_name', 'tour_img_1', 'tour_img_2', 'tour_img_3', 'tour_overview', 'tour_trip', 'tour_map', 'tour_day', 'tour_price'];
}
