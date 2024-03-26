<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function showAll(Request $request)
    {
        $employees = Employee::all();
        return view('employees', ['employeesList' => $employees, 'flag' => 'employees']);
    }
}
