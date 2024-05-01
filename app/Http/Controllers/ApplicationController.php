<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\District;
use App\Models\Faculty;
use App\Models\FailedApplications;
use App\Models\Group;
use App\Models\Profession;
use App\Models\Quarter;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{
    public function index()
    {
        $id=Auth::user()->id;
        $apps=Application::where('user_id',$id)->get();
        $failed_apps=FailedApplications::where('user_id',$id)->get();
        return view('student.index-application',compact('apps','failed_apps'));
    }

    public function create()
    {
        return view('student.create-application');
    }

    public function store(Request $request)
    {
        $requestData = $request->all();

        $userId = Auth::user()->id;
        $requestData['user_id'] = $userId;

        if ($request->hasFile('privelege_file')) {
            $file = $request->file('privelege_file');
            $fileName = time() . ' - ' . $file->getClientOriginalName();

            $file->move('files/', $fileName);
            $requestData['privelege_file'] = $fileName;
        }

        Application::create([
            "user_id" => $requestData['user_id'],
            "lastname"=>$requestData['lastname'],
            "firstname" => $requestData['firstname'],
            "jshshir" => $requestData['jshshir'],
            "gender" => $requestData['type'],
            "phone" => $requestData['phone'],
            "region_id" => $requestData['region'],
            "district_id" => $requestData['city'],
            "quarter_id" => $requestData['mpj'],
            "street" => $requestData['street'],
            "faculty_id" => $requestData['faculty'],
            "profession_id" => $requestData['profession'],
            "group_id" => $requestData['group'],
            "privelege_name" => $requestData['priveleges'],
            "privelege_file" => $requestData['privelege_file']
        ]);
        return  redirect()->route('indexApp');
    }

    //admin
    public function adminIndex()
    {
        $apps=Application::all();
        return view('admin.index-application',compact('apps'));
    }

    public function adminShow($id)
    {
        // $app=DB::table('applications')
        // ->where('id','=',$id)
        // ->select('id','user_id','status','lastname','firstname','jshshir','phone','regions.name as region','districts.name as district','quarters.name as quarter','street','faculties.name as faculty','professions.name as profession','groups.name as group','privelege_name','privelege_file')
        // ->join('regions','applications.region_id','=','regions.id')
        // ->join('districts','applications.district_id','=','districts.id')
        // ->join('quarters','applications.quarter_id','=','quarters.id')
        // ->join('faculties','applications.faculty_id','=','faculties.id')
        // ->join('professions','applications.profession_id','=','professions.id')
        // ->join('groups','applications.group_id','=','groups.id')
        // ->get();

        $app=Application::findOrFail($id);
        $region=Region::findOrFail($app->region_id);
        $district=District::findOrFail($app->district_id);
        $quarter=quarter::findOrFail($app->quarter_id);
        $faculty=Faculty::findOrFail($app->faculty_id);
        $profession=Profession::findOrFail($app->profession_id);
        $group=Group::findOrFail($app->group_id);
        return view('admin.show-app',compact('app','region','district','quarter','faculty','profession','group'));
    }
    public function adminDownload($id)
    {
        $path = 'files/'.Application::where("id", $id)->value("privelege_file");
        return Storage::download($path);
    }
    public function successApp()
    {
        $apps=Application::where('status','=','success')->get();
        return view('admin.success-app',compact('apps'));
    }
}
