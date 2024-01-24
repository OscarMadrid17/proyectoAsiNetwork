<?php

namespace App\Http\Controllers\Employees;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


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

    public function employees_store(Request $request){

        $credentialsEmployee = request()->except('_token');

        if(Auth()->user()->is_superadmin){
            $credentialsEmployee = $request->validate([
                'name'              =>  'required|string|max:255',
                'email'             =>  'required|email|unique:users,email|max:255',
                'password'          =>  'required|min:6',
                'is_superadmin'     =>  'required|in:yes,no'
            ]);

            $credentialsEmployee = User::create([
                'name'          =>$credentialsEmployee['name'],
                'email'         =>$credentialsEmployee['email'],
                'password'      =>$credentialsEmployee['password'],
                'is_superadmin' =>$credentialsEmployee['is_superadmin'] == 'yes' ? 1 : 0,
            ]);

            return redirect()->route('admin.home')->with('message','usuario creado exitosamente');
        }
        else{
            return redirect()->route('admin.employees')->with('message','No tiene credenciales de administrador');
        }
    }
}
