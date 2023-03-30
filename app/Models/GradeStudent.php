<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradeStudent extends Model
{
    use HasFactory;

    protected $fillable = [
        'grade_id',
        'student_id',
        'generation_id',
        'group'
    ];

    protected $table = 'grades_student';

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function generation()
    {
        return $this->belongsTo(Generation::class);
    }
}
