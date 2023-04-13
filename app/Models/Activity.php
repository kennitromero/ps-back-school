<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    private $filleable = [
        'grade_subject_id',
        'name',
        'percentage',
        'end_date'
    ];

    public function gradeSubject()
    {
        return $this->belongsTo(GradeSubject::class, 'grade_subject_id');
    }
}
