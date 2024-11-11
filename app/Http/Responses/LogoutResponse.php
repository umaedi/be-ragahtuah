<?php

namespace App\Http\Responses;

use App\Models\Student;
use Laravel\Fortify\Contracts\LogoutResponse as LogoutResponseContract;

class LogoutResponse implements LogoutResponseContract
{

    /**
     * toResponse
     *
     * @param  mixed $request
     * @return void
     */
    public function toResponse($request)
    {


        Student::where('id', auth()->user()->id)->update(['login' => '2']);
        return redirect('/');
    }
}
