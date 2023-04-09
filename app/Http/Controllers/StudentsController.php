<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

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
        return view('student.index', [
            'title' => 'Students',
            'students' => $students
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create', [
            'title' => 'Create Student'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nama' => 'required',
            'jurusan' => 'required',
            'title' => 'required',
            'bio' => 'required',
            'slug' => 'required|unique:students',
            'image' => 'image|file|min:512'
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->bio), 200);
        
        Student::create($validatedData);

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
        return view('student.show', [
            'title' => 'Student Details'
        ], compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('student.edit', [
            'title' => 'Student Update'
        ], compact('student'));
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
        $rules = [
            'nama' => 'required',
            'jurusan' => 'required',
            'title' => 'required',
            'bio' => 'required',
            'image' => 'image|file|min:512'
        ];

        if ($request->slug != $student->slug) {
            $rules['slug'] = 'required|unique:students';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->bio), 200);

        Student::where('id', $student->id)
                ->update($validatedData);

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
        if($student->image) {
            Storage::delete($student->image);
        }
        Student::destroy($student->id);
        return redirect('/students')->with('status', 'student deleted successfully!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Student::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
