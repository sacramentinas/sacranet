<?php

namespace Sacranet\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        "alunos/uploadfotos",
        "responsavel/login",
        "responsavel",
        "responsavel/loginsite",
        "login"

    ];
}
