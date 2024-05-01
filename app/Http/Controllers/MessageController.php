<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\FailedApplications;
use App\Models\Message;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $app_id = $request->app_id;

        Message::create([
            'user_id' => $request->user_id,
            'app_id' => $request->app_id,
            'title' => $request->title,
            'body' => $request->body
        ]);

        if ($request->danger == "Biykarlaw") {
            $app = Application::where('id', $app_id)->first();
            $app->status = 'Not accepted';
            $app->save();
            $app=Application::where('id', $app_id)->first();
            FailedApplications::create([
                "user_id" => $app['user_id'],
                "status"=>$app['status'],
                "lastname"=>$app['lastname'],
                "firstname" => $app['firstname'],
                "jshshir" => $app['jshshir'],
                "gender" => $app['gender'],
                "phone" => $app['phone'],
                "region_id" => $app['region_id'],
                "district_id" => $app['district_id'],
                "quarter_id" => $app['quarter_id'],
                "street" => $app['street'],
                "faculty_id" => $app['faculty_id'],
                "profession_id" => $app['profession_id'],
                "group_id" => $app['group_id'],
                "privelege_name" => $app['privelege_name'],
                "privelege_file" => $app['privelege_file']
            ]);
            $app->delete();
        } else {
            $app = Application::where('id', $app_id)->first();
            $app->status = 'success';
            $app->save();
        }
        return redirect()->route('adminIndexApp');
    }
    public function index()
    {
        $user=Auth::user();
        $messages=Message::where('user_id',$user->id);
        return view('student.layaut',compact('user'));
    }
    public function readAll()
    {
        $user=Auth::user();
        $messages=Message::where('user_id',$user->id)->get();
        foreach($messages as $message)
        {
            $message->status=1;
            $message->save();
        }
        return redirect()->route('dashboard');
    }
}
