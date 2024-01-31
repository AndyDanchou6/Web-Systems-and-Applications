<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChaptersModel extends Model
{
    use HasFactory;

    protected $table = 'chapters';

    protected $fillable = [
        'chapter_title',
        'date',
        'manga_id',
        'contents',
        'status',
    ];
}
