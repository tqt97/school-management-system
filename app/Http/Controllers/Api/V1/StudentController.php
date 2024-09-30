<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\StudentResource;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    // get all exam of student
    public function getExamOfStudent($id)
    {
        // $exam = DB::table('students as st')
        //     ->join('student_subjects as ss', 'ss.student_id', '=', 'st.id')
        //     ->join('subjects as sub', 'sub.id', '=', 'ss.subject_id')
        //     ->join('schools as s', 's.id', '=', 'st.school_id')
        //     ->join('exams as sc', 'sc.student_id', '=', 'st.id')
        //     ->select(
        //         'st.name as class_name',
        //         's.name as school_name',
        //         'sc.year',
        //         'sub.name as subject_name',
        //         'sc.score',
        //         'sc.coefficient',
        //         'sc.type',
        //         'sc.created_at'
        //     )
        //     ->where('st.id', $id)
        //     ->groupBy('st.name', 's.name', 'sc.year', 'sub.name', 'sc.score', 'sc.coefficient', 'sc.type', 'sc.created_at')
        //     ->get();


        // $exam = Student::findOrFail($id)->exams;

        $student = Student::where('id', $id)
        ->with('exams')->get();
        // dd($id, $student);
        $exam = StudentResource::collection($student);

        return $exam;
    }

}
