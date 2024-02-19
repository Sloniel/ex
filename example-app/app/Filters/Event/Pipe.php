<?php

namespace App\Filters\Event;

use Closure;

interface Pipe{
    public function apply($query, Closure $next);
}
