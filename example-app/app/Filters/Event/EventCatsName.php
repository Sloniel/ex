<?php

namespace App\Filters\Event;
use App\Filters\Event\Pipe;
use Closure;

class EventCatsName implements Pipe {

    public function apply($query, Closure $next)
    {
        if (request()->get('name')) {
            $query->where(function($q) {
                $q->orWhere('name', 'LIKE', '%'.request()->get('name').'%');
            });
        }
        return $next($query);
    }

}