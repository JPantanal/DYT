<?php

namespace App\Enums;

enum EventStateEnum: int
{
    case UNSENT = 0;
    case PENDING = 1;
    case SCHEDULED = 2;
    CASE CANCELED = 3;
    CASE UNAVAILABLE = 4;
}
