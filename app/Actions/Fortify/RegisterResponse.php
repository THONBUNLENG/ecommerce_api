<?php

namespace App\Actions\Fortify;

use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContract;

class RegisterResponse implements RegisterResponseContract
{
    public function toResponse($request)
    {
        $user = $request->user();

        if (! $user) {
            return redirect()->route('register');
        }

        if ($user->role === 'admin') {
            return redirect()->route('panel.dashboard');
        }

        return redirect()->route('dashboard');
    }
}