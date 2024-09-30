<?php

namespace App\Http\Resources\V1;

use App\Http\Resources\V1\ExamResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'students',
            'id' => $this->id,
            'attributes' => [
                'name' => $this->name,
            ],
            // 'relationships' => [
            //     'school' => [
            //         'data' => [
            //             'type' => 'schools',
            //             'id' => $this->school_id
            //         ]
            //     ]
            // ],
            // 'includes' => [
            'exams' => ExamResource::collection($this->whenLoaded('exams'))
            // ],

        ];
    }
}
