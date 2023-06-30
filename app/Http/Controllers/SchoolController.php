<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schools = School::all();
        return view('school', compact('schools'));
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
            'name' => 'required',
            'email' => 'required',
            'website' => 'required',
            'logo' => 'required'
        ]);


        $data = new School();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->website = $request->website;

        if($request->file('logo')){
            $path = $request->file('logo')->store();
        }
        
        $data->logo = $path;

        $data->save();

        Mail::send('schoolemail', ['data' => $data] , function($message) {
            $message->to('admin@gmail.com')->subject('New School');   
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
    public function edit($id)
    {
        $school = School::findOrFail($id);

        return view('school_edit', compact('school'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'website' => 'required',
            // 'logo' => 'required',
        ]);

        $data = School::findOrFail($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->website = $request->website;

        $data->save();
     
        return redirect()->route('school.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        School::findOrFail($id)->delete();
        return redirect()->back();
    }
}
