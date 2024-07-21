<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Member;
use Illuminate\Support\Facades\Storage;

class ViewProfile extends Component
{

    
    public $selectedRegion;
    public $selectedProvince;
    public $selectedMunicipality;
    public $selectedBarangay;
    public $regions;

    public $members=[];

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


    public function mount($member_id = null)
{
    if ($member_id) {
        $this->loadMemberData($member_id);
    }
}

public function loadMemberData($member)
{
    // $this->member = Member::find($member_id);
    $this->member = Member::where('user_id', auth()->user()->id)->first();
    
    if ($this->member) {
        $this->member_id = $this->member->id;
        $this->last_name = $this->member->last_name;
        $this->first_name = $this->member->first_name;
        $this->middle_name = $this->member->middle_name;
        $this->email = $this->member->email;
        $this->phone = $this->member->phone;
        $this->aka = $this->member->aka;
        $this->batch_name = $this->member->batch_name;
        $this->t_birth = $this->member->t_birth;
        $this->user_type = $this->member->user_type;
        $this->gt = $this->member->gt;
        $this->current_chapter = $this->member->current_chapter;
        $this->root_chapter = $this->member->root_chapter;
        $this->status = $this->member->status;
        $this->address = $this->member->address;
        $this->photoPath = $this->member->photo;
    } else {
        // Handle the case where the member is not found
        session()->flash('error', 'Member not found.');
        return redirect()->back();
    }
}

// public function edit($rowId)
// {
//     $this->loadMemberData($rowId);
// }

public function view($rowId)
{
    $this->loadMemberData($rowId);
}

    public function render()
    {
       
        // Render the view with the member data
        return view('livewire.view-profile');
    }
}








    // public function mount( $member_id)
    // {
 
    //     $this->member = Member::find($member_id);
    // //  dd($member);
    // if ($this->member) {
    //     $this->member_id = $this->member->id;
    //     $this->last_name = $this->member->last_name;
    //     $this->first_name = $this->member->first_name;
    //     $this->middle_name = $this->member->middle_name;
    //     $this->email = $this->member->email;
    //     $this->phone = $this->member->phone;
    //     $this->aka = $this->member->aka;
    //     $this->batch_name = $this->member->batch_name;
    //     $this->t_birth = $this->member->t_birth;
    //     $this->user_type = $this->member->user_type;
    //     $this->gt = $this->member->gt;
    //     $this->current_chapter = $this->member->current_chapter;
    //     $this->root_chapter = $this->member->root_chapter;
    //     $this->status = $this->member->status;
    //     $this->address = $this->member->address;
    //     $this->photoPath = $this->member->photoPath;
    // } else {
    //     // Handle the case where the member is not found
    //     session()->flash('error', 'Member not found.');
    //     return redirect()->route('some_route'); // Redirect to a relevant route
    // }

      
       


    // }