<?php

namespace App\Livewire;

use App\Models\Faculty;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Profession extends Component
{
    public $faculties;
    public $facultyId;
    public $professions;
    public function mount()
    {
        $this->faculties=Faculty::all();
    }
    public function updatedFacultyId(){
        if($this->facultyId !=''){
            $this->professions = DB::table('professions')->where('faculty_id',$this->facultyId)->get();
           }else{
         $this->professions = [];
            }
    }
    public function render()
    {   $this->updatedFacultyId();
        return view('livewire.profession');
    }
}
