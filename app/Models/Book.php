<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';

    use HasFactory; // Add this line

    //fillable
    protected $fillable = [
        'title',
        'description',
        'author'
    ];

    //guarded
    protected $guarded = [
        'created_at',
        'updated_at'
    ];
}
