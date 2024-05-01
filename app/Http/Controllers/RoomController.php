<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoomRequest;
use App\Models\Attachment;
use App\Models\Floor;
use Illuminate\Support\Facades\DB;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = DB::table('rooms')
            ->join('floors', 'rooms.floor_id', '=', 'floors.id')
            ->select('rooms.*', 'floors.name as floor_name')
            ->paginate(10);
        return view('admin.index-room', compact('rooms'));
    }
    public function create()
    {
        $floors = Floor::all();
        return view('admin.create-room', compact('floors'));
    }
    public function store(StoreRoomRequest $request)
    {
        Room::create([
            'floor_id'=>$request->floor_id,
            'room_name'=>$request->room_name,
            'room_number'=>$request->room_number,
            'capacity'=>$request->capacity,
            'all_capacity'=>$request->capacity
        ]);
        return redirect()->route('indexRoom')->with('message', 'Room created succesfuly');
    }
    public function edit($id)
    {
        $floors = Floor::all();
        return view('admin.edit-room', compact('id', 'floors'));
    }
    public function update(StoreRoomRequest $request, $id)
    {
        $room = Room::findOrFail($id);
        $room->floor_id = $request->floor_id;
        $room->room_name = $request->room_name;
        $room->room_number = $request->room_number;
        $room->all_capacity = $request->capacity;
        $room->save();
        return redirect()->route('indexRoom')->with('message', 'Room updated succesfuly');
    }

    public function delete($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();
        return redirect()->route('indexRoom')->with('message', 'Room deleted succesfuly');
    }
    public function detail($id)
    {
        $room=Room::findOrFail($id);
        $floor=Floor::findOrFail($room->floor_id);
        $students = DB::table('attachments')->where('room_id',$id)
        ->join('applications', 'applications.id', '=', 'attachments.app_id')->get();
        return view('admin.show-room',compact('students','room','floor'));
    }

}
