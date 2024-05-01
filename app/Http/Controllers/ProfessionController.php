<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfessionRequest;
use App\Models\Faculty;
use App\Models\Profession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfessionController extends Controller
{
    public function index()
    {   $professions = DB::table('professions')
        ->select('professions.id', 'professions.name', 'faculties.name as faculty_name')
        ->join('faculties', 'faculties.id', '=', 'professions.faculty_id')
        ->paginate(10);
        // dd($professions);
        $title = 'Delete Profession!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('admin.index-profession',compact('professions'));
    }

    public function create()
    {
        $faculties = Faculty::all();
        return view('admin.create-profession',compact('faculties'));
    }

    public function store(StoreProfessionRequest $request)
    {
        Profession::create([
            'name' => $request->name,
            'faculty_id'=>$request->faculty
        ]);
        return redirect()->route('indexProfession')->with('message','Profession created Successfuly!');
    }

    public function edit($id){
        $faculties = Faculty::all();
        return view('admin.edit-profession',compact('id','faculties'));
    }
    public function update(StoreProfessionRequest $request, $id)
    {
        $profession = Profession::findOrFail($id);
        $profession->name = $request->name;
        $profession->faculty_id = $request->faculty;
        $profession->save();
        return redirect()->route('indexProfession')->with('message','Profession updated succesfuly');
    }

    public function delete($id)
    {
        $profession = Profession::findOrFail($id);
        $profession->delete();
        return redirect()->route('indexProfession')->with('message','Profession deleted succesfuly');
    }
}
