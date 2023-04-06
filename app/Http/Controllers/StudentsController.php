<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('student.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $student = new Student;
        // $student->nrp = $request->nrp;
        // $student->nama = $request->nama;
        // $student->email = $request->email;
        // $student->jurusan = $request->jurusan;
        // $student->save();

        // Student::create([
        //     'nrp' => $request->nrp,
        //     'nama' => $request->nama,
        //     'email' => $request->email,
        //     'jurusan' => $request->jurusan,
        // ]);

        $request->validate([
            'nrp' => 'required|size:9',
            'nama' => 'required',
            'email' => 'required',
            'jurusan' => 'required',
        ]);

        Student::create($request->all());

        return redirect('/students')->with('status', 'student added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'nrp' => 'required|size:9',
            'nama' => 'required',
            'email' => 'required',
            'jurusan' => 'required',
        ]);

        Student::where('id', $student->id)
                ->update([
                    'nrp' => $request->nrp,
                    'nama' => $request->nama,
                    'email' => $request->email,
                    'jurusan' => $request->jurusan
                ]);

        return redirect('/students')->with('status', 'student updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        Student::destroy($student->id);
        return redirect('/students')->with('status', 'student deleted successfully!');
    }
}