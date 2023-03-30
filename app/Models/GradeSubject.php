<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradeSubject extends Model
{
    use HasFactory;

    protected $fillable = [
        'grade_id',
        'subject_id',
        'generation_id'
    ];

    protected $table = 'grades_subjects';

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function subjects()
    {
        return $this->belongsTo(Subject::class);
    }

    public function generation()
    {
        return $this->belongsTo(Generation::class);
    }
}
