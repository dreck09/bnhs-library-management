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
        'qty',
        'categories',
        'image',
    ];

    public function issue_book()
    {
        return $this->hasMany(IssueBook::class);
    }
    
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function assign_book_category()
    {
        return $this->hasMany(AssignBookCategory::class);
    }
}
