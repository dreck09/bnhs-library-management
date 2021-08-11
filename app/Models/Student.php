<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'fullname',
        'gender',
        'grade_section',
        'cpnumber',
    ];

    public function issue_book()
    {
        return $this->hasMany(IssueBook::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
