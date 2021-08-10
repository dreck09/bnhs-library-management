<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'title',
        'description',
        'author',
        'categories',
        'image',
    ];

    public function issue_book()
    {
        return $this->hasMany(IssueBook::class);
    }
}
