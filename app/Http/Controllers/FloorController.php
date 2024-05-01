<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFloorRequest;
use App\Models\Floor;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FloorController extends Controller
{
    public function index()
    {
        $floors = Floor::paginate(10);
        $title = 'Delete Floor!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('admin.index-floor',compact('floors'));
    }

    public function create()
    {

        return view('admin.create-floor');
    }

    public function store(StoreFloorRequest $request)
    {

        Floor::create([
            'name' => $request->name,
            'floor_number' => $request->floor_number,
            'type' => $request->type,
        ]);

        return redirect()->route('indexFloor')->with('message','Floor created Successfuly!');

    }

    public function edit($id){
        return view('admin.edit-floor',compact('id'));
    }
    public function update(StoreFloorRequest $request, $id)
    {
        $floor = Floor::findOrFail($id);
        $floor->name = $request->name;
        $floor->floor_number = $request->floor_number;
        $floor->type = $request->type;
        $floor->save();
        return redirect()->route('indexFloor')->with('message','Floor updated succesfuly');
    }

    public function delete($id)
    {
        $floor = Floor::findOrFail($id);
        $floor->delete();
        return redirect()->route('indexFloor')->with('message','Floor deleted succesfuly');
    }
}
