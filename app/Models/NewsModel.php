<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsModel extends Model
{
    use HasFactory;

    protected $table = 'news_models';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'sort',
        'is_visible'
    ];


}
