<?php

namespace App\Http\Controllers\Admin\Dashboard\General;

use App\Http\Controllers\Controller;
use App\Models\Matter;
use App\Models\Order;
use App\Models\Student;
use App\Models\User;
use App\Notifications\Admin\Order\OrderNew;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class GeneralController extends Controller
{
    public function index(){
        $matters = Matter::count();
        $students = Student::count();
        return view('admin.dashboard.general.index', compact('matters', 'students'));
    }
}
