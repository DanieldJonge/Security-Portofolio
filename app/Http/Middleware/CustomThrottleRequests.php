<?php

namespace App\Http\Middleware;

use Illuminate\Routing\Middleware\ThrottleRequests;

class CustomThrottleRequests extends ThrottleRequests
{
    /**
     * Get the maximum number of attempts to allow.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return int
     */
    protected function maxAttempts($request)
    {
        return 10; //custom maximum number of attempts
    }

    /**
     * Get the number of minutes to throttle for.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return int
     */
    protected function decayMinutes($request)
    {
        return 1; //custom decay minutes
    }
}
