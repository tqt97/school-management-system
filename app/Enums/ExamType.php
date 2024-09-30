<?php

namespace App\Enums;

enum ExamType: string
{
        // 'oral', '15_minutes', '1_hour', 'final'

    case ORAL = 'oral';
    case FIFTEEN_MINUTES = '15_minutes';
    case ONE_HOUR = '1_hour';
    case FINAL = 'final';
}
