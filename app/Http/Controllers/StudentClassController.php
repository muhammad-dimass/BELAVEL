<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentClass;


class StudentClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('studentsclasses.index', [
            'classes' => StudentClass::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('studentsclasses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required','min:3'],
            'slug' => ['required','min:3'],
        ]
        // ['name.required' => 'kolom nama harus diisi']
        );

        $class = new StudentClass();

        $class->name = $request->name;
        $class->slug = $request->slug;

        $class->save();

        session()->flash('success', 'Add Data Successfully');   
        return redirect()->route('studentclass.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $classes = StudentClass::find($id);
        return view('studentsclasses.edit', [
            'class' => $classes
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required','min:3'],
            'slug' => ['required','min:3'],
        ]
        // ['name.required' => 'kolom nama harus diisi']
        );
        
        $class = StudentClass::find($id);

        $class->name = $request->name;
        $class->slug = $request->slug;
        


        $class->save(); 
        // session()->flash('success', 'Update Data Successfully');   
        return redirect()->route('studentclass.index')->with('info', 'update data successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $class = StudentClass::find($id);
        $class->delete();
        session()->flash('danger', 'Delete Data Successfully');   
        return redirect()->route('studentclass.index');
    }
}
