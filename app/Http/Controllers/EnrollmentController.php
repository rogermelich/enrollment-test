<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Scool\Enrollment\Http\Controllers\Controller;

class EnrollmentController extends Controller
{
    //
    /**
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = [];
        return view('Enrollment',$data);
    }

}
