<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Member;
use Illuminate\Support\Facades\Storage;

class ViewMember extends Component
{

    
    public $selectedRegion;
    public $selectedProvince;
    public $selectedMunicipality;
    public $selectedBarangay;
    public $regions;

    public $members;

    public $photo;


    public $last_name;
    public $first_name;
    public $middle_name;
    public $email;
    public $phone;
    public $aka;
    public $batch_name;
    public $t_birth;

    public $user_type;

    public $gt;
    public $current_chapter;
    public $root_chapter;
    public $status;
    public $address;

    public $photoPath;

    public $id;

    public $member;
    
    public $user_id;
    public $member_id;

    public $selectedMemberId;



public function mount($member_id){
    $this->member_id = $member_id;
    $this->loadMemberData();
}
    public function loadMemberData()
    {
        $member = Member::find($this->member_id);

        if ($member) {
            $this->member_id = $member->member_id;

            $this->last_name = $member->last_name;
            $this->first_name = $member->first_name;
            $this->middle_name = $member->middle_name;
            $this->email = $member->email;
            $this->phone = $member->phone;
            $this->aka = $member->aka;
            $this->batch_name = $member->batch_name;
            $this->t_birth = $member->t_birth;
            $this->user_type = $member->user_type;
            $this->gt = $member->gt;
            $this->current_chapter = $member->current_chapter;
            $this->root_chapter = $member->root_chapter;
            $this->status = $member->status;
            $this->address = $member->address;
            $this->photoPath = $member->photoPath;
        } else {
            // Handle the case where the member is not found
            return redirect()->back();
        }
    }

   






    public function render()
    {
       
        // Render the view with the member data
        return view('livewire.view-member');
    }
}








