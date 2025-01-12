<?php

namespace App\Enums;

use ArchTech\Enums\Options;

enum StatusEnum: string
{
    use Options;

    case PENDING = 'pending';
    case PROCESSING = 'processing';
    case COMPLETED = 'completed';
    case CANCELLED = 'cancelled';
}
