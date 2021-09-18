<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait Auths
{
    public function currentUser()
    {
        return Auth::user();
    }

}
