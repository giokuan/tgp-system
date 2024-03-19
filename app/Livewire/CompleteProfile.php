<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Member;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Mary\Traits\Toast;
use Livewire\WithFileUploads;

class CompleteProfile extends Component
{
    use Toast;
    use WithFileUploads;

    #[Validate('required')]
    public $last_name="";

    #[Validate('required')]
    public $first_name="";

    #[Validate('required')]
    public $middle_name="";
    
    #[Validate('required')]
    public $email="";

    #[Validate('required')]
    public $phone="";

    #[Validate('required')]
    public $aka="";

    #[Validate('required')]
    public $batch_name="";

    #[Validate('required')]
    public $t_birth="";

    #[Validate('required')]
    public $gt="";

    #[Validate('required')]
    public $current_chapter="";

    #[Validate('required')]
    public $root_chapter="";

    #[Validate('required')]
    public $status="";

    #[Validate('required')]
    public $address="";

    #[Validate('required')]
    public $regions=[];
    #[Validate('required')]
    public $selectedRegion;

    #[Validate('required')]
    public $selectedProvince;

    #[Validate('required')]
    public $selectedMunicipality;

    #[Validate('required')]
    public $selectedBarangay;

    public $user_type="";

    public $user;
    public $memberId;

    #[Validate('image|max:1024')] // 1MB Max
    public $photo;




 

    public function save()
    {
        
        
    $this->validate();
   

    $lastNameInitial = strtoupper(substr($this->last_name, 0, 1));
    $firstNameInitial = strtoupper(substr($this->first_name, 0, 1));
    $middleNameInitial = strtoupper(substr($this->middle_name ?? '', 0, 1)); // Use middle_name if provided
    $birthday = date('Ymd', strtotime($this->t_birth));
    $randomNumber = rand(100000, 999999); // Generate a random 6-digit number
    $memberId = $lastNameInitial . $firstNameInitial . $middleNameInitial . $birthday . $randomNumber;

    // dd($this->all());
    $user = auth()->user()->id;

    $photo = $this->photo->store('uploads', 'public');


        Member::create([
            'user_id'=>$user,
            'member_id'=>$memberId,
            'last_name'=> $this->last_name,
            'first_name'=> $this->first_name,
            'middle_name' => $this->middle_name,
            't_birth'=> $this->t_birth,
            'email' => $this->email,
            'phone'=> $this->phone,
            'aka'=> $this->aka,
            'gt'=> $this->gt,
            'batch_name'=> $this->batch_name,
            'current_chapter'=> $this->current_chapter,
            'root_chapter'=> $this->root_chapter,
            'status'=> $this->status,
            'user_type'=>$this->user_type,
            'address'=> $this->address,
            'region'=> $this->selectedRegion,
            'province'=> $this->selectedProvince,
            'municipality'=> $this->selectedMunicipality,
            'barangay'=> $this->selectedBarangay,
            'photo'=> $photo,
          
           
            
        ]);

    
        $this->reset();
  

        $this->success("Profile saved successfully!", 'Thank you!', 'toast-top toast-end');
        return redirect()->to('dashboard');

    }
    public function render()
    {
        // return view('livewire.complete-profile');
        return view('livewire.complete-profile', [
            'provinces' => $this->getProvinces(),
        ]);
    }

    public function mount()
    {
        $json = Storage::disk('public')->get('address-api.json');
        $this->regions = json_decode($json, true);

        $this->user = Auth::user(); // Retrieve the authenticated user
        $this->email = Auth::user()->email;
        $this->user_type = Auth::user()->user_type;
        $this->user = Auth::user()->id;
    }

    public function setSelectedRegion($value)
    {
        $this->selectedRegion = $value;
        $this->selectedProvince = null;
        $this->selectedMunicipality = null;
        $this->selectedBarangay = null;
    }

    public function setSelectedProvince($value)
    {
        $this->selectedProvince = $value;
        $this->selectedMunicipality = null;
        $this->selectedBarangay = null;
    }

    public function setSelectedMunicipality($value)
    {
        $this->selectedMunicipality = $value;
        $this->selectedBarangay = null;
    }

    public function getProvinces()
    {
        if (!$this->selectedRegion || !isset($this->regions[$this->selectedRegion]['province_list'])) {
            return [];
        }

        return $this->regions[$this->selectedRegion]['province_list'];
    }

  

}
