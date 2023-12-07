<?php

namespace App\Http\Controllers\Employees;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminEmployeesController extends Controller
{
    public function employees() {
        $employees = User::where('id', '!=', auth()->user()->id)->get();

        return view('pages.admin.employees', [
            'employees' => $employees
        ]);
    }

    public function employees_create() {
        return view('pages.admin.employees_create');
    }
}
