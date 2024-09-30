<?php

namespace App\Models;

use App\Enums\ExamType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'subject_id',
        'type',
        'score',
        'year',
        'coefficient',
    ];

    // cast
    protected $casts = [
        'score' => 'float',
        'year' => 'integer',
        'coefficient' => 'integer',
        'type' => ExamType::class,
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    // public function getScoreAttribute($value)
    // {
    //     return round($value, 2);
    // }

    // public function getYearAttribute($value)
    // {
    //     return (int) $value;
    // }

    // public function getCoefficientAttribute($value)
    // {
    //     return (int) $value;
    // }

    // public function getCreatedAtAttribute($value)
    // {
    //     return date('d/m/Y', strtotime($value));
    // }
}
