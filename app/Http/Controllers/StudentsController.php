<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\StudentClass;
use Illuminate\Support\Facades\Storage;

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
            return view('students.create',
        [
            'classes' => StudentClass::get()
        ]);
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required','min:3'],
            'addres' => ['required','min:3'],
            'phone_number' => ['required','numeric','min:10'],
            'photo' => ['image']
        ]
        // ['name.required' => 'kolom nama harus diisi']
        );

        $photo = null;

        if($request->hasFile('photo')) {
            $photo = $request->file('photo')->store('photos');
        }

        $student = new Student();

        $student->name = $request->name;
        $student->addres = $request->addres;
        $student->phone_number = $request->phone_number;
        $student->student_class_id = $request->student_class_id;
        $student->photo = $photo;

        $student->save();

        session()->flash('success', 'Add Data Successfully');   
        return redirect()->route('students.index');

    }

    public function edit($id)
    {
        $students = Student::find($id);
        return view('students.edit',[
            'student' => $students,
            'classes' => StudentClass::get()
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required','min:3'],
            'addres' => ['required','min:3'],
            'phone_number' => ['required','numeric','min:10'],
        ]
        // ['name.required' => 'kolom nama harus diisi']
        );
        
        $student = Student::find($id);

        $photo = $student->photo;

        if($request->hasFile('photo')) {
           if($photo != null){
            if(Storage::exists($photo)) {
                Storage::delete($photo);
            }
        }
           

            $photo = $request->file('photo')->store('photos');
        }

        $student->name = $request->name;
        $student->addres = $request->addres;
        $student->phone_number = $request->phone_number;
        $student->student_class_id = $request->student_class_id;
        $student->photo = $photo;


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
