<?php

namespace App\Models;

use App\Enums\SchoolLevel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'level',
    ];

    // cast

    protected $casts = [
        'level' => SchoolLevel::class,
    ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function principal()
    {
        return $this->hasOne(Principal::class);
    }

    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }
}
