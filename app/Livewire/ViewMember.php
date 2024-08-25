<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Member;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;


class ViewMember extends Component
{

    


    public $memberId;
    public $member;

    public function mount($memberId)
    {
        $this->memberId = $memberId;
        $this->member = Member::find($memberId);
    }

    public function render()
    {
        return view('livewire.view-member');
    }





    // public function render()
    // {
       
       
    //     return view('livewire.view-member');
    // }
}








