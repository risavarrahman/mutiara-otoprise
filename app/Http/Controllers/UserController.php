<?php

namespace App\Http\Controllers;

use App\Models\CRMCalendar;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('dashboard.user.index', [
            'title' => 'Dashboard',
        ]);
    }
}
