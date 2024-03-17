<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;

class AddressApi extends Component
{
    #[Validate('required')]
    public $regions;
    #[Validate('required')]
    public $selectedRegion;

    #[Validate('required')]
    public $selectedProvince;

    #[Validate('required')]
    public $selectedMunicipality;

    #[Validate('required')]
    public $selectedBarangay;

    public function mount()
    {
        // Load JSON data
        $json = Storage::disk('public')->get('address-api.json');
        $this->regions = json_decode($json, true);
    }

    public function render()
    {
        return view('livewire.address-api', [
            'provinces' => $this->getProvinces(),
        ]);
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

    public function selectAddress($address)
    {
        // Emit an event to pass the selected address to the parent component
        $this->emitUp('addressSelected', [
            'address' => $address,
            'region' => $this->selectedRegion,
            'province' => $this->selectedProvince,
            'municipality' => $this->selectedMunicipality,
            'barangay' => $this->selectedBarangay,
        ]);
    }

}
