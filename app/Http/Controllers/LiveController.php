<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Student;
use Illuminate\Http\Request;

class LiveController extends Controller
{
    public function index()
    {
        if (\request()->ajax()) {
            $data['table'] = Grade::with('student')->get();
            return view('_data_live', $data);
        }
        return view('live');
    }
}
