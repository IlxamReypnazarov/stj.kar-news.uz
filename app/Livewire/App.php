<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class App extends Component
{
    public $regions;
    public $regionId ;
    public $cityId;
    public $cities;

    public $quarters ;
    
    public function mount()
    {
        $this->regions = DB::table('regions')->get();
    }
    
     public function updatedRegionId(){
        if($this->regionId !=''){
            $this->cities = DB::table('districts')->where('region_id',$this->regionId)->get();
           }else{
         $this->cities = [];
            }
    }   

    public function updatedCitiesId(){
        if($this->cityId !=''){
            $this->quarters = DB::table('quarters')->where('district_id',$this->cityId)->get();
           }else{
         $this->quarters = [];
            }
    }
    public function render()
    {
        $this->updatedRegionId();
        $this->updatedCitiesId();
        return view('livewire.app');
    }
}
