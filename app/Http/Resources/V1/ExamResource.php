<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ExamResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'exams',
            'id' => $this->id,
            'attributes' => [
                'student_id' => $this->student_id,
                'subject_id' => $this->subject_id,
                'type' => $this->type,
                'score' => $this->score,
                'year' => $this->year,
                'coefficient' => $this->coefficient,
                // 'created_at' => $this->created_at,
                // 'updated_at' => $this->updated_at
            ],
        ];
    }
}
