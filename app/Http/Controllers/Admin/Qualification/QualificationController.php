<?php

namespace App\Http\Controllers\Admin\Qualification;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QualificationController extends Controller
{
    public function index(){
        return view('admin.qualification.index');
    }
}
