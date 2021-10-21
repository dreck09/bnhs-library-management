<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignBookCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'book_category_id',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function book_category()
    {
        return $this->belongsTo(BookCategory::class);
    }
}
