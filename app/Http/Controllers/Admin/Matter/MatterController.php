<?php

namespace App\Http\Controllers\Admin\Matter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MatterController extends Controller
{
    public function index(){
        return view('admin.matter.index');
    }
}
