<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Member;


class EditProfile extends Component
{

    public $members;
    public $user;
    public function mount()
    {
        
        // $this->members = Member::query()->with('user');
        // $this->members = Member::all();
        $this->members = Member::where('user_id', auth()->user()->id)->get();
        // $this->members = Member::query()->with('user')->get();
        // dd($this->members);
    }
 

    public function render()
    {
        return view('livewire.edit-profile');
           
    }
}
