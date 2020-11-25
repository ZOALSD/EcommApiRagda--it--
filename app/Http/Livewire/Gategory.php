<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Model\Categories;

class Gategory extends Component
{
    public $SearchText = '' ;
    public $SearchDate ;
    
    public function render()
    {

        $datase =  Categories::where('name','like','%'.$this->SearchText.'%')->paginate(10);
        return view('livewire.gategory',\compact('datase'));
    }
}