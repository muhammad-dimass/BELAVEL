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
            'students' => Student::latest()->get(),
        ]);
    }

    public function create()
    {
            return view('students.create');
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required','min:3'],
            'addres' => ['required','min:3'],
            'phone_number' => ['required','numeric','min:10'],
            'class' => ['required','min:3']
        ]
        // ['name.required' => 'kolom nama harus diisi']
        );

        $student = new Student();

        $student->name = $request->name;
        $student->addres = $request->addres;
        $student->phone_number = $request->phone_number;
        $student->class = $request->class;

        $student->save();

        session()->flash('success', 'Add Data Successfully');   
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
        $this->validate($request, [
            'name' => ['required','min:3'],
            'addres' => ['required','min:3'],
            'phone_number' => ['required','numeric','min:10'],
            'class' => ['required','min:3']
        ]
        // ['name.required' => 'kolom nama harus diisi']
        );
        
        $student = Student::find($id);

        $student->name = $request->name;
        $student->addres = $request->addres;
        $student->phone_number = $request->phone_number;
        $student->class = $request->class;

        $student->save(); 
        // session()->flash('success', 'Update Data Successfully');   
        return redirect()->route('students.index')->with('info', 'update data successfully');

    }
    public function destroy($id)
    {
        $students = Student::find($id);
        $students->delete();
        session()->flash('danger', 'Delete Data Successfully');   
        return redirect()->route('students.index');
    }

}
