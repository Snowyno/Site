<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'livewire/*',
        'checkout/callback/cashfree',
        'checkout/callback/paytabs',
        'account/deposit/callback/mollie/webhook',
        'callback/paytabs',
        'callback/jazzcash',
        'callback/paytr',
        'account/deposit/callback/paytabs',
        'checkout/callback/mercadopago/webhook'
    ];

    
    public function handle($request, Closure $next)
    {
        unset($request['_token']);
        return parent::handle($request, $next);
    }
}
