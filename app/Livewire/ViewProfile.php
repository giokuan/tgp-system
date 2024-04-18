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

    public $user_id;
    public $member_id;

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




    public function mount( $member_id)
    {
 
        $member = Member::find($member_id);
        // dd($member);

      
       


    }


    public function render()
    {
       
        // Render the view with the member data
        return view('livewire.view-profile');
    }
}
