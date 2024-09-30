<?php

namespace App\Enums;

enum SchoolLevel: string
{
    // 'primary', 'secondary', 'higher'

    case PRIMARY = 'primary';
    case SECONDARY = 'secondary';
    case HIGHER = 'higher';
}
