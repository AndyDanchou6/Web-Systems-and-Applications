<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MangaModel extends Model
{
    use HasFactory;

    protected $table = 'manga';

    protected $fillable = [
        'title',
        'author',
        'genre',
        'date_published',
    ];
}
