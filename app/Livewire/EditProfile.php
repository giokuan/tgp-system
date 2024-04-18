<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Member;
use Illuminate\Support\Facades\Storage;

use Livewire\WithFileUploads;
use Mary\Traits\Toast;

class EditProfile extends Component
{
    use Toast;
    use WithFileUploads;
    public $selectedRegion;
    public $selectedProvince;
    public $selectedMunicipality;
    public $selectedBarangay;
    public $regions;

    public $members;

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

    

    



    public function mount()
    {
        // $this->regions = json_decode(Storage::disk('public')->get('address-api.json'), true);

        $json = Storage::disk('public')->get('address-api.json');
        $this->regions = json_decode($json, true);
        
        $this->members = Member::where('user_id', auth()->user()->id)->first();
        
        // dd($this->members);
        $this->user_id = $this->members->user_id;
        $this->member_id = $this->members->member_id;
        $this->last_name = $this->members->last_name;
        $this->first_name = $this->members->first_name;
        $this->middle_name = $this->members->middle_name;
        $this->email = $this->members->email;
        $this->phone = $this->members->phone;
        $this->aka = $this->members->aka;
        $this->batch_name = $this->members->batch_name;
        $this->t_birth = $this->members->t_birth;
        $this->gt = $this->members->gt;
        $this->current_chapter = $this->members->current_chapter;
        $this->root_chapter = $this->members->root_chapter;
        $this->status = $this->members->status;
        $this->user_type = $this->members->user_type;
        $this->address = $this->members->address;
        $this->photo = $this->members->photo;

        
        
        // Populate the address details if available
        if ($this->members) {
            $this->selectedRegion = $this->members->region;
            $this->selectedProvince = $this->members->province;
            $this->selectedMunicipality = $this->members->municipality;
            $this->selectedBarangay = $this->members->barangay;
        }
    }

    public function render()
    {
        $members = Member::where('user_id', auth()->user()->id)->get();
       
        return view('livewire.edit-profile', [
            'members' => $members,
            'provinces' => $this->getProvinces(),
        ]);
    }

    public function setSelectedRegion($region)
    {
        $this->selectedRegion = $region;
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



    public function updateProfile()
    {
        
        
        $members = Member::where('user_id', auth()->user()->id)->first();

        $photoPath = $members->photo;;

        if ($this->photo && $this->members->photo) {
            Storage::delete('public/' . $this->members->photo);
        }
      

        if ($this->photo instanceof \Illuminate\Http\UploadedFile && $this->photo->isValid()) {
            $photoPath = $this->photo->store('uploads', 'public');
        }
       
 
        $members->update([
            'user_id' => $this->user_id,
            'member_id' => $this->member_id,
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'aka' => $this->aka,
            'batch_name' => $this->batch_name,
            't_birth' => $this->t_birth,
            'gt' => $this->gt,
            'current_chapter' => $this->current_chapter,
            'root_chapter' => $this->root_chapter,
            'status' => $this->status,
            'user_type' => $this->user_type,
            'photo' => $photoPath,
            'region' => $this->selectedRegion,
            'province' => $this->selectedProvince,
            'municipality' => $this->selectedMunicipality,
            'barangay' => $this->selectedBarangay,
            'address' => $this->address,
        ]);

        // Display success message
        $this->success("Profile updated successfully!", 'Thank you!', 'toast-top toast-end');
        return redirect()->back();
    }


}
