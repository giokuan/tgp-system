<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Member;



class ViewMember extends Component
{

    
    public $member;

    public function mount($id)
    {
        $this->member = Member::find($id);

        if (!$this->member) {
            return redirect()->back()->with('error', 'Member not found.');
        }
    }

    public function render()
    {
        // Render the Livewire view without the layout method
        return view('livewire.view-member');
    }

}








