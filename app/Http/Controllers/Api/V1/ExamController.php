<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UpdateExamRequest;
use App\Http\Resources\V1\ExamResource;
use App\Models\Exam;
use App\Models\Student;
use Illuminate\Http\Request;

class ExamController extends Controller
{

    public function index()
    {
        return ExamResource::collection(Exam::all());
    }

    public function update($id, UpdateExamRequest $request)
    {
        $data = $request->validated();
        $exam = Exam::findOrFail($id);
        $student = $exam->update($data);

        return json_encode($student);
    }
}
