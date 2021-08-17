<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotReturn extends Model
{
    use HasFactory;

    protected $fillable = [
        'issue_id',
        'report_on',
        'qty',
        'fines',
        'remarks',
    ];

    public function issue_book()
    {
        return $this->belongsTo(IssueBook::class);
    }
}
