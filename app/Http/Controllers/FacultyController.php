<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFacultyRequest;
use App\Models\Faculty;

class FacultyController extends Controller
{
    public function index()
    {
        $faculties = Faculty::paginate(10);
        $title = 'Delete Faculty!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('admin.index-faculty',compact('faculties'));
    }

    public function create()
    {
        return view('admin.create-faculty');
    }

    public function store(StoreFacultyRequest $request)
    {
        Faculty::create([
            'name' => $request->name
        ]);
        return redirect()->route('indexFaculty')->with('message','Faculty created Successfuly!');
    }

    public function edit($id){
        return view('admin.edit-faculty',compact('id'));
    }
    public function update(StoreFacultyRequest $request, $id)
    {
        $faculty = Faculty::findOrFail($id);
        $faculty->name = $request->name;
        $faculty->save();
        return redirect()->route('indexFaculty')->with('message','Faculty updated succesfuly');
    }

    public function delete($id)
    {
        $faculty = Faculty::findOrFail($id);
        $faculty->delete();
        return redirect()->route('indexFloor')->with('message','Floor deleted succesfuly');
    }
}
