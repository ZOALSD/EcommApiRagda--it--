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
        $d =  Categories::search($this->SearchText)->count();
        if($d == 0){
            $datase = Categories::search('')->paginate(10);;
        }else{
        $datase = Categories::search($this->SearchText)->paginate(10);
        }
        
        return view('livewire.gategory',\compact('datase','d'));
    }
}