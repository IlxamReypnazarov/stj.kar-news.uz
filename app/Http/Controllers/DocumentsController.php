<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentsController extends Controller
{
    public function index()
    {
        $user=Auth::user();
        $docs=document::where('user_id',$user->id)->get();
        return view('student.index-docs',compact('docs'));
    }
}
