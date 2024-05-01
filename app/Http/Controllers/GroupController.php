<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGroupRequest;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{
    public function index()
    {   $groups = DB::table('groups')
        ->select('groups.id', 'groups.name','professions.name as profession_name', 'faculties.name as faculty_name')
        ->join('professions', 'professions.id', '=', 'groups.profession_id')
        ->join('faculties', 'faculties.id', '=', 'professions.faculty_id')
        ->paginate(10);
        // dd($professions);
        $title = 'Delete Group!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('admin.index-group',compact('groups'));
    }

    public function create()
    {
        return view('admin.create-group');
    }

    public function store(StoreGroupRequest $request)
    {
        Group::create([
            'name' => $request->name,
            'profession_id'=>$request->profession
        ]);
        return redirect()->route('indexGroup')->with('message','Group created Successfuly!');
    }

    public function edit($id){
        return view('admin.edit-group',compact('id'));
    }
    public function update(StoreGroupRequest $request, $id)
    {
        $group = Group::findOrFail($id);
        $group->name = $request->name;
        $group->profession_id = $request->profession;
        $group->save();
        return redirect()->route('indexGroup')->with('message','Group updated succesfuly');
    }

    public function delete($id)
    {
        $group = Group::findOrFail($id);
        $group->delete();
        return redirect()->route('indexGroup')->with('message','Group deleted succesfuly');
    }
}
