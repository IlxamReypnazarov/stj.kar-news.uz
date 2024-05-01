<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Attachment;
use App\Models\document;
use App\Models\Floor;
use App\Models\Message;
use App\Models\Room;
use Illuminate\Http\Request;

class AttachmentController extends Controller
{
    public function create($id)
    {
        $app = Application::findOrFail($id);
        return view('admin.create-attachment', compact('app'));
    }
    public function store(Request $request)
    {
        $app = Application::findOrFail($request->app_id);

        $room = Room::where('id', $request->room)->first();

        $floor = Floor::where('id', $room->floor_id)->first();
        if ($room->capacity > 0) {

            Attachment::create([
                'app_id' => $app->id,
                'floor_id' => $request->floor,
                'room_id' => $request->room,
            ]);
        }

        $room->decrement('capacity');
        if ($room->capacity == 0) {
            $room->status = 0;
        }

        $app->status = "attached";
        $app->save();
        $room->save();

        Message::create(
            [
                'user_id' => $app->user_id,
                'app_id' => $app->id,
                'title' => "Siz $floor->floor_number-etaj $room->room_number-xanaǵa jaylastırıldıńız!",
                'body' => "Null",
            ]
        );

        document::create(
            [
                'user_id' => $app->user_id,
                'app_id' => $app->id,
                'room_id' => $room->id
            ]
        );
        Message::create(
            [
                'user_id' => $app->user_id,
                'app_id' => $app->id,
                'title' => "Sizge jollanba xat pdf kórinisinde jiberildi `Documents` bólimin kóriń!",
                'body' => "Null",
            ]
        );

        return redirect()->route('successApp');
    }
    public function delete($id)
    {
        $attachment = Attachment::findOrFail($id);
        $room = Room::findOrFail($attachment->room_id);
        $room->increment('capacity');
        $room->save();
        $attachment->delete();
        return redirect()->route('indexRoom')->with('message', 'Student deleted succesfuly');
    }
    public function move($id)
    {
        $attachment = Application::findOrFail($id);
        return view('admin.edit-attachment', compact('attachment'));
    }
    public function storeMove(Request $request)
    {
        // dd($request->all());
        $id=$request->attachment_id;
        $attachment=Attachment::findOrFail($id);
        $app=Application::findOrFail($attachment->app_id);
        $room1=Room::findOrFail($attachment->room_id);
        $room1->increment('capacity');
        $attachment->floor_id=$request->floor;
        $attachment->room_id=$request->room;
        $floor=Floor::findOrFail($request->floor);
        $room=Room::findOrFail($request->room);
        $room1->save();
        $room2=Room::findOrFail($request->room);
        $room2->decrement('capacity');
        if ($room2->capacity == 0) {
            $room2->status = 0;
        }
        Message::create(
            [
                'user_id' => $app->user_id,
                'app_id' => $app->id,
                'title' => "Siz $floor->floor_number-etaj $room->room_number-xanaǵa kóshirildińiz!",
                'body' => "Null",
            ]
        );
        $room2->save();
        $attachment->save();
            $last_doc=document::where('user_id',$app->user_id)->get();
            if($last_doc!=null)
            {
                $last_doc->delete();
            }

        document::create(
            [
                'user_id' => $app->user_id,
                'app_id' => $app->id,
                'room_id' => $room2->id
            ]
        );
        Message::create(
            [
                'user_id' => $app->user_id,
                'app_id' => $app->id,
                'title' => "Sizge jollanba xat pdf kórinisinde jiberildi `Documents` bólimin kóriń!",
                'body' => "Null",
            ]
        );
        return redirect()->route('indexRoom')->with('message', 'Student moved succesfuly');
    }
}
