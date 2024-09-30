<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Enums\ExamType;
use App\Enums\SchoolLevel;
use App\Models\Exam;
use App\Models\Principal;
use App\Models\School;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        School::factory(5)->create();
        Principal::factory(5)->create();
        Teacher::factory(10)->create();
        Subject::factory(10)->create();
        $students = Student::factory(10)->create();
        Exam::factory(100)->create();


        // attach student and subject
        foreach ($students as $student) {
            $id = $student->id;
            $st = Student::find($id);
            $st->subjects()->attach($id);
            $st->subjects()->attach($id);
        }

        // detach student and subject
        // $student = Student::find(1);
        // $student->subjects()->detach(1);
        // $student->subjects()->attach(1);

        // // detach teacher and subject factory
        // $teacher = Teacher::find(1);
        // $teacher->subjects()->detach(1);
        // $teacher->subjects()->attach(1);


        \App\Models\User::factory()->create([
            'name' => 'TuanTQ',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12341234')
        ]);
    }
}
