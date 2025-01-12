<?php

namespace App\Enums;

use ArchTech\Enums\Options;

enum TaskStatusEnum: string
{
    use Options;

    case NEW  = 'new';
    case PROCESSING  = 'processing';
    case COMPLETED = 'completed';
    case CANCELLED = 'cancelled';
}
