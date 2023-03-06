<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentsController extends Controller
{
    public function index()
    {
        $tes = Student::all();
            return view('students.index', compact('tes'), [
            'students' => Student::get(),
        ]);
    }

    public function create()
    {
            return view('students.create');
    }
    
    public function store(Request $request)
    {
        $student = new Student();

        $student->name = $request->name;
        $student->addres = $request->addres;
        $student->phone_number = $request->phone_number;
        $student->class = $request->class;

        $student->save();   
        return redirect()->route('students.index');

    }

    public function edit($id)
    {
        $students = Student::find($id);
        return view('students.edit',[
            'student' => $students,
        ]);
    }

    public function update(Request $request, $id)
    {
        $student = Student::find($id);

        $student->name = $request->name;
        $student->addres = $request->addres;
        $student->phone_number = $request->phone_number;
        $student->class = $request->class;

        $student->save();   
        return redirect()->route('students.index');

    }

}
