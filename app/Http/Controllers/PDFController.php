<?php

namespace App\Http\Controllers;

use App\Models\document;
use Illuminate\Support\Facades\DB;
use PDF;

class PDFController extends Controller
{
    public function generatePDF($id)
    {
        $doc = DB::table('documents')
        ->join('applications', 'applications.id', '=', 'documents.app_id')
        ->join('rooms', 'rooms.id', '=', 'documents.room_id')
        ->join('floors', 'floors.id', '=', 'rooms.floor_id')
        ->join('faculties', 'faculties.id', '=', 'applications.faculty_id')
        ->join('professions', 'professions.id', '=', 'applications.profession_id')
        ->join('groups', 'groups.id', '=', 'applications.group_id')
        ->where('documents.id', $id)
        ->select('documents.id as id','documents.created_at','applications.lastname','applications.firstname','applications.jshshir','faculties.name as faculty_name','professions.name as profession_name','groups.name as group_name','floor_number','room_number')
        ->get();
        $data=[
            'id'=>$doc['0']->id,
            'created_at'=>$doc['0']->created_at,
            'lastname'=>$doc['0']->lastname,
            'firstname'=>$doc['0']->firstname,
            'jshshir'=>$doc['0']->jshshir,
            'faculty_name'=>$doc['0']->faculty_name,
            'profession_name'=>$doc['0']->profession_name,
            'group_name'=>$doc['0']->group_name,
            'floor_number'=>$doc['0']->floor_number,
            'room_number'=>$doc['0']->room_number,
        ];

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.document',$data);
        return $pdf->download('document.pdf');
    }
}
