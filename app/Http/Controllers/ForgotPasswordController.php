<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResetPasswordRequest;
use App\Jobs\SendResetLink;



class ForgotPasswordController extends Controller
{
    public function __invoke(ResetPasswordRequest $request)
    {
        $data = $request->validated();
        SendResetLink::dispatch($data['email'])->onQueue('reset-link')->delay(now()->addSeconds(5));
    }
}
