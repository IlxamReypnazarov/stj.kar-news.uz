<?php

namespace App\Livewire;

use App\Models\Faculty;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Group extends Component
{
    public $faculties;
    public $facultyId;
    public $professions;
    public $groups;
    public $professionId;
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
    public function updatedProfessionId(){
        if($this->professionId !=''){
            $this->groups = DB::table('groups')->where('profession_id',$this->professionId)->get();
           }else{
         $this->groups = [];
            }
    }
    public function render()
    {
        $this->updatedFacultyId();
        $this->updatedProfessionId();
        return view('livewire.group');
    }
}
