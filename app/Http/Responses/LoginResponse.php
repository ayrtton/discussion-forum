<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request) {
        $home = auth()->user()->hasRole('admin') ? '/admin/dashboard' : '/dashboard';

        return redirect()->intended($home);
    }
}
