<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schools = School::all();
        $students = Student::with('school')->get();
        return view('student', compact('students', 'schools'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'school' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        $data = Student::create([
            'first_name' => $request->fname,
            'last_name' => $request->lname,
            'school_id' => $request->school,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        
            Mail::send('email', ['data' => $data] , function($message) {
                $message->to('aswinjithp7@gmail.com')->subject('New Student');   
            });

        return redirect()->back();
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
    public function edit(string $id)
    {
        $schools = School::all();
        $student = Student::findOrFail($id);
        return view('student_edit', compact('schools', 'student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'school' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        $data = Student::findOrFail($id);
        $data->first_name = $request->fname;
        $data->last_name = $request->lname;
        $data->school_id = $request->school;
        $data->email = $request->email;
        $data->phone = $request->phone;

        $data->save();
     
        return redirect()->route('student.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Student::findOrFail($id)->delete();
        return redirect()->back();
    }
}
