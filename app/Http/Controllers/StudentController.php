<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
public function index()
{
    $students = Student::latest()->paginate(5);
    return view('students.index',compact('students'))
        ->with('i', (request()->input('page', 1) -1) *5);
}

public function create()
{
    return view('students.create');
}

public function store(Request $request)
{
    $request->validate([
        'studentname' => 'required',
        'course' => 'required',
        'fee' => 'required',

    ]);
}

public function show (Student $student)
{

}


}
