<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IssueBook extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'student_id',
        'issue_date',
        'qty',
        'status',
        'return_date',
    ];

    public function return_book()
    {
        return $this->hasMany(ReturnBook::class);
    }

    public function not_return()
    {
        return $this->hasMany(NotReturn::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
    
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
