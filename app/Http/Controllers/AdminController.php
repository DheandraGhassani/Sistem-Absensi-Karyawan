<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Employee;
use App\Models\Group;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
    {
        $employees =  Employee::where('status', 'active')->count();
        $group = Group::count();
        $totalLaporan = Absensi::count();
        return view("admin.index", compact('employees', 'group', 'totalLaporan'));
    }
};
