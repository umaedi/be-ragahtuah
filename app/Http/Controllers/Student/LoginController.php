<?php

namespace App\Http\Controllers\Student;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //validate the form data
        $this->validate($request, [
            'nisn'      => 'required',
            'password'  => 'required',
        ]);

        //cek nisn dan password
        $student = Student::where([
            'nisn'      => $request->nisn,
            'password'  => $request->password
        ])->first();

        if (!$student) {
            return redirect()->back()->with('error', 'NISN atau Password salah');
        }

        if ($student->login == '2') {
            return redirect()->back()->with('error', 'Anda hanya bisa login 1X dalam satu sesi');
        }

        $student->login = '1';
        $student->save();

        //login the user
        auth()->guard('student')->login($student);

        //redirect to dashboard
        return redirect()->route('student.dashboard');
    }
}
