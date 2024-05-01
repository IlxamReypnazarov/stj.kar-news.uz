<?php

namespace App\Livewire;

use App\Models\Floor;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CreateAttachment extends Component
{
    public $floors;
    public $floorId;
    public $rooms;
    public function mount()
    {
        $this->floors=Floor::all();
    }
    public function updatedFloorId(){
        if($this->floorId !=''){
            $this->rooms = DB::table('rooms')->where('floor_id',$this->floorId)->get();
           }else{
         $this->rooms = [];
            }
    }
    public function render()
    {   $this->updatedFloorId();
        return view('livewire.create-attachment');
    }
}
