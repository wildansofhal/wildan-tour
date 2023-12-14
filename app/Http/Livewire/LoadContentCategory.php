<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\DashPackage;
use App\Models\DashCategory;

class LoadContentCategory extends Component
{
    public $loadItem = 6;
    public $loopItem = 6;

    public $package;
    
    public function mount($package)
    {
        $this->package = $package;
    }

    public function render()
    {   
        $packages = $this->package->take($this->loadItem);
        return view('livewire.load-content-category' , [
            'packages' => $packages,
            'total' => $this->package->count(),
        ]);
    }

    public function loadmore(){
        $this->loadItem += $this->loopItem;
        sleep(2);
        $this->emit('scrollIntoView', 'new-data');
    }
}
