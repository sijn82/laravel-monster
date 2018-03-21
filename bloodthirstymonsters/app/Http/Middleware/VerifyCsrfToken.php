<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //

        '/monsters',
        '/monsters/new',
        '/monsters/*',
        '/api/monsters/*',
        '/api/monsters/8',
        '/new-monster/upload',
        '/api/monsters/img',
        'monsters/api/monsters/img',
        '/monsters/img',
        '/monsters/public/img',
        '/public/img',
        '/img',
        '/dashboard',
    ];
}
