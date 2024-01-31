<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestsModel extends Model
{
    use HasFactory;

    protected $table = 'requests';

    protected $fillable = [
        'title',
        'author',
        'genre',
        'date_of_request',
        'status',
    ];
}
