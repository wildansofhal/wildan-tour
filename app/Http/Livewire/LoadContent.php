<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\DashPackage;
use App\Models\DashCategory;

class LoadContent extends Component
{
    public $loadItem = 6;
    public $loopItem = 6;

    public function render()
    {   
        $package = DashPackage::orderBy('id' , 'desc')->take($this->loadItem)->get();
        return view('livewire.load-content' , [
            'package' => $package,
            'total' => DashPackage::all()->count(),
        ]);
    }

    public function loadmore(){
        $this->loadItem += $this->loopItem;
        sleep(2);
        $this->emit('scrollIntoView', 'new-data');
    }
}
