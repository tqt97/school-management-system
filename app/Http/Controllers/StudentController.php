<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function history($id)
    {
        $history = DB::table('students as st')
        ->join('schools as s', 's.id', '=', 'st.school_id')
        ->join('exams as sc', 'sc.student_id', '=', 'st.id')
        ->join('student_subjects as ss', 'ss.student_id', '=', 'st.id')
        ->join('subjects as sub', 'sub.id', '=', 'ss.subject_id')
        ->select(
            'st.name as student_name',
            's.name as school_name',
            'sc.year',

            DB::raw('ROUND(SUM(sc.score * sc.coefficient) / SUM(sc.coefficient), 2) as average_score'),
            // DB::raw('GROUP_CONCAT(CONCAT(sub.name, ": ", sc.score) ORDER BY sub.name SEPARATOR ", ") as subject_scores'),
            DB::raw('GROUP_CONCAT(sc.score SEPARATOR ", ") as subject_scores')
        )
        ->where('st.id', $id)  // Filter by student ID
        ->groupBy('st.id', 's.name', 'sc.year')  // Group by student ID, school name, and year
        ->orderBy('sc.year', 'desc')
        ->get();

        return $history;
    }

    // public function getExcellentStudent($id)
    // {
    //     $score = DB::table('students as st')
    //         ->join('student_subjects as ss', 'ss.student_id', '=', 'st.id')
    //         ->join('subjects as sub', 'sub.id', '=', 'ss.subject_id')
    //         ->join('schools as s', 's.id', '=', 'st.school_id')
    //         ->join('exams as sc', 'sc.student_id', '=', 'st.id')
    //         ->select(
    //             'st.name as class_name',
    //             's.name as school_name',
    //             'sc.year',
    //             'sub.name as subject_name',
    //             'sc.score',
    //             'sc.coefficient'
    //         )
    //         ->where('st.id', $id)
    //         ->where('sc.score', '>=', 8.0)
    //         ->get();

    //     return $score;
    // }

    // public function getHigherThanEight()
    // {
    //     $score = DB::table('students as st')
    //         ->join('student_subjects as ss', 'ss.student_id', '=', 'st.id')
    //         ->join('subjects as sub', 'sub.id', '=', 'ss.subject_id')
    //         ->join('schools as s', 's.id', '=', 'st.school_id')
    //         ->join('exams as sc', 'sc.student_id', '=', 'st.id')
    //         ->select(
    //             'st.name as student_name',
    //             's.name as school_name',
    //             'sc.year',
    //             'sub.name as subject_name',
    //             'sc.score',
    //             // 'sc.coefficient'
    //         )
    //         ->where(function ($query) {
    //             // $query->where('sub.name', 'Ngữ văn')
    //             //     ->andWhere('sub.name', 'Toán')
    //             //     ->andWhere('sub.name', 'Tiếng anh');
    //             // 3 subject higher than 8.0
    //             $query->whereIn('sub.name', ['Ngữ văn', 'Toán', 'Tiếng anh'])
    //                 ->where('sc.score', '>=', 8.0);
    //         })
    //         ->where('sc.score', '>=', 8.0)
    //         ->groupBy('st.name', 's.name', 'sc.year')
    //         ->orderBy('sc.year', 'desc')
    //         ->get();

    //     return $score;
    // }

    // public function getListHigherThan6Point5()
    // {
    //     $score = DB::table('students as st')
    //         ->join('student_subjects as ss', 'ss.student_id', '=', 'st.id')
    //         ->join('subjects as sub', 'sub.id', '=', 'ss.subject_id')
    //         ->join('schools as s', 's.id', '=', 'st.school_id')
    //         ->join('exams as sc', 'sc.student_id', '=', 'st.id')
    //         ->select(
    //             'st.name as class_name',
    //             's.name as school_name',
    //             'sc.year',
    //             'sub.name as subject_name',
    //             'sc.score',
    //             'sc.coefficient'
    //         )
    //         ->where('sc.score', '>=', 6.5)
    //         ->get();

    //     return $score;
    // }

    public function getBestStudent1()
    {
        return Student::select('students.id', 'students.name')
            ->join('student_subjects', 'students.id', '=', 'student_subjects.student_id')
            ->join('subjects', 'subjects.id', '=', 'student_subjects.subject_id')
            ->join('schools', 'schools.id', '=', 'students.school_id')
            ->join('exams', 'students.id', '=', 'exams.student_id')
            ->groupBy('students.id')
            ->havingRaw('AVG(exams.score) >= ?', [8.0])
            ->havingRaw('MIN(exams.score) >= ?', [6.5])
            ->havingRaw('SUM(CASE WHEN subjects.name IN (?, ?, ?) AND exams.score >= ? THEN 1 ELSE 0 END) > 0', ['Ngữ văn', 'Toán', 'Tiếng Anh', 8.0])
            ->get();
    }

    public function getBestStudent2()
    {
        return DB::table('students')
            ->join('student_subjects', 'students.id', '=', 'student_subjects.student_id')
            ->join('subjects', 'subjects.id', '=', 'student_subjects.subject_id')
            ->join('exams', 'students.id', '=', 'exams.student_id')
            ->select('students.id', 'students.name')
            ->groupBy('students.id', 'students.name')
            ->havingRaw('AVG(exams.score) >= ?', [8.0])
            ->havingRaw('MIN(exams.score) >= ?', [6.5])
            ->havingRaw('SUM(CASE WHEN subjects.name IN (?, ?, ?) AND exams.score >= ? THEN 1 ELSE 0 END) > 0', ['Ngữ văn', 'Toán', 'Tiếng Anh', 8.0])
            ->get();
    }

    public function getBestStudent3()
    {
        return DB::select(
            "SELECT students.id, students.name
            FROM students
            JOIN exams ON students.id = exams.student_id
            JOIN student_subjects ON students.id = student_subjects.student_id
            JOIN subjects ON subjects.id = student_subjects.subject_id
            WHERE subjects.name IN ('Ngữ văn', 'Toán', 'Tiếng Anh')
            GROUP BY students.id, students.name
            HAVING AVG(exams.score) >= 8.0
            AND MIN(exams.score) >= 6.5
            AND SUM(CASE WHEN subjects.name IN ('Ngữ văn', 'Toán', 'Tiếng Anh')
                AND exams.score >= 8 THEN 1 ELSE 0 END) > 0"
        );
    }
}
