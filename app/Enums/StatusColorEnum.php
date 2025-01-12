<?php

namespace App\Enums;

use ArchTech\Enums\Options;

enum StatusColorEnum: string
{
    use Options;

    case PENDING  = 'primary';
    case IN_PROGRESS = 'warning';
    case COMPLETED = 'success';
    case CANCELLED = 'danger';
}
