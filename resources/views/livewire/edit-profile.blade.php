<div class="md:mx-36">
    <x-mary-toast />
    <form wire:submit="updateProfile" method="POST">
        <div class="mt-4 border-2 border-blue-400 rounded-lg xl:mx-14">
            <div class="mt-10 font-bold text-center">Complete your Profile</div>


            <div class="pl-2">

                <x-mary-file wire:model="photo">
                    <img src="{{ asset('storage/' . $members->photo) }}" class="h-40 rounded-lg" />
                </x-mary-file>

                <input type="hidden" wire:model="member_id" value="{{ $members->member_id }}" />
                {{-- <input wire:model="user_id" name="user_id" value="{{ $members->user_id }}" /> --}}
                <input type="hidden" wire:model="user_id" name="user_id" value="{{ $user_id }}" />


            </div>



            <div class="p-2">
                <div class="flex flex-col gap-2 xl:flex-row">
                    <input value="{{ $members->last_name }}" type="text" wire:model="last_name" name="last_name"
                        class="block w-full px-4 py-4 mt-1 bg-white border rounded-md shadow-sm border-slate-300 placeholder-slate-400 placeholder:text-gray-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm" />
                    <div>
                        @error('last_name')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <input value="{{ $members->first_name }}" type="text" wire:model="first_name" name="first_name"
                        class="block w-full px-4 py-4 mt-1 bg-white border rounded-md shadow-sm border-slate-300 placeholder-slate-400 placeholder:text-gray-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm"
                        placeholder="First Name" autocomplete="given-name" />
                    <div>
                        @error('first_name')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <input value="{{ $members->middle_name }}" type="text" wire:model="middle_name"
                        name="middle_name"
                        class="block w-full px-4 py-4 mt-1 bg-white border rounded-md shadow-sm border-slate-300 placeholder-slate-400 placeholder:text-gray-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm"
                        placeholder="Middle Name" />
                    <div>
                        @error('middle_name')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-col gap-2 my-6 xl:flex-row">
                    <input value="{{ $members->email }}" type="email" wire:model="email" name="email"
                        class="block w-full px-3 py-4 mt-1 bg-white border rounded-md shadow-sm border-slate-300 placeholder-slate-400 placeholder:text-gray-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm"
                        placeholder="Email" autocomplete="email" disabled />
                    @error('email')
                        <span class="error">{{ $message }}</span>
                    @enderror
                    <input value="{{ $members->phone }}" type="text" wire:model="phone" name="phone"
                        class="block w-full px-3 py-4 mt-1 bg-white border rounded-md shadow-sm border-slate-300 placeholder-slate-400 placeholder:text-gray-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm"
                        placeholder="Phone" autocomplete="phone" />
                    @error('phone')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col gap-4 my-6 xl:flex-row">
                    <input value="{{ $members->aka }}" type="text" wire:model="aka" name="aka"
                        class="block w-full px-3 py-4 mt-1 bg-white border rounded-md shadow-sm border-slate-300 placeholder-slate-400 placeholder:text-gray-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm"
                        placeholder="AKA" />
                    @error('aka')
                        <span class="error">{{ $message }}</span>
                    @enderror
                    <input value="{{ $members->batch_name }}" type="text" wire:model="batch_name" name="batch_name"
                        class="block w-full px-3 py-4 mt-1 bg-white border rounded-md shadow-sm border-slate-300 placeholder-slate-400 placeholder:text-gray-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm"
                        placeholder="Batch Name" aria-atomic="" />
                    @error('batch_name')
                        <span class="error">{{ $message }}</span>
                    @enderror
                    <input value="{{ $members->t_birth }}" type="date" wire:model="t_birth" name="t_birth"
                        class="block w-full px-3 py-4 mt-1 bg-white border rounded-md shadow-sm border-slate-300 placeholder-slate-400 placeholder:text-gray-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm"
                        placeholder="T-Birth" />
                    @error('t_birth')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col gap-4 xl:flex-row">
                    <input value="{{ $members->gt }}" type="text" wire:model="gt" name="gt"
                        class="block w-full px-3 py-4 mt-1 bg-white border rounded-md shadow-sm border-slate-300 placeholder-slate-400 placeholder:text-gray-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm"
                        placeholder="GT" />
                    @error('gt')
                        <span class="error">{{ $message }}</span>
                    @enderror
                    <input value="{{ $members->current_chapter }}" type="text" wire:model="current_chapter"
                        name="current_chapter"
                        class="block w-full px-3 py-4 mt-1 bg-white border rounded-md shadow-sm border-slate-300 placeholder-slate-400 placeholder:text-gray-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm"
                        placeholder="Current Chapter" />
                    @error('current_chapter')
                        <span class="error">{{ $message }}</span>
                    @enderror
                    <input value="{{ $members->root_chapter }}" type="text" wire:model="root_chapter"
                        name="root_chapter"
                        class="block w-full px-3 py-4 mt-1 bg-white border rounded-md shadow-sm border-slate-300 placeholder-slate-400 placeholder:text-gray-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm"
                        placeholder="Root Chapter" />
                    @error('root_chapter')
                        <span class="error">{{ $message }}</span>
                    @enderror
                    <input value="{{ $members->status }}" type="text" wire:model="status" name="status"
                        class="block w-full px-3 py-4 mt-1 bg-white border rounded-md shadow-sm border-slate-300 placeholder-slate-400 placeholder:text-gray-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm"
                        placeholder="Status" />
                    @error('status')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col my-2 xl:gap-4 xl:flex-row">


                    <div class="flex flex-col w-full xl:gap-4 ">
                        <div class="flex flex-col w-full my-4 xl:gap-4 xl:flex-row">
                            {{-- <select wire:model="selectedRegion" name="selectedRegion"
                                class="w-full px-3 py-4 text-gray-500 bg-white border rounded-md shadow-sm border-slate-300 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm">
                                <option value=""></option>
                                @foreach ($regions as $regionKey => $region)
                                    <option value="{{ $regionKey }}">
                                        {{ $region['region_name'] }}
                                    </option>
                                @endforeach
                            </select> --}}


                            <select wire:model="selectedRegion" name="selectedRegion"
                                wire:change="setSelectedRegion($event.target.value)"
                                class="w-full px-3 py-4 text-gray-500 bg-white border rounded-md shadow-sm border-slate-300 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm">
                                <option value=""></option>
                                @foreach ($regions as $regionKey => $region)
                                    <option value="{{ $regionKey }}">
                                        {{ $region['region_name'] }}
                                    </option>
                                @endforeach
                            </select>

                            @error('selectedRegion')
                                <span class="error">{{ $message }}</span>
                            @enderror


                            <select wire:model="selectedProvince"
                                wire:change="setSelectedProvince($event.target.value)" name="selectedProvince"
                                class="w-full px-3 py-4 text-gray-500 bg-white border rounded-md shadow-sm border-slate-300 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm">
                                <option value="">Select Province</option>
                                @foreach ($provinces as $province => $data)
                                    <option value="{{ $province }}">{{ $province }}</option>
                                @endforeach
                            </select>
                            @error('selectedProvince')
                                <span class="error">{{ $message }}</span>
                            @enderror

                        </div>

                        <div class="flex flex-col w-full gap-4 xl:flex-row">
                            <select wire:model="selectedMunicipality"
                                wire:change="setSelectedMunicipality($event.target.value)" name="selectedMunicipality"
                                class="w-full px-3 py-4 text-gray-500 bg-white border rounded-md shadow-sm border-slate-300 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm">
                                <option value="">Select Municipality</option>
                                @if ($selectedRegion && $selectedProvince)
                                    @foreach ($regions[$selectedRegion]['province_list'][$selectedProvince]['municipality_list'] as $municipality => $data)
                                        <option value="{{ $municipality }}">{{ $municipality }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error('selectedMunicipality')
                                <span class="error">{{ $message }}</span>
                            @enderror


                            <select wire:model="selectedBarangay" name="selectedBarangay"
                                class="w-full px-3 py-4 text-gray-500 bg-white border rounded-md shadow-sm border-slate-300 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm">
                                <option value="">Select Barangay</option>
                                @if ($selectedRegion && $selectedProvince && $selectedMunicipality)
                                    @foreach ($regions[$selectedRegion]['province_list'][$selectedProvince]['municipality_list'][$selectedMunicipality]['barangay_list'] as $barangay)
                                        <option value="{{ $barangay }}">{{ $barangay }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error('selectedBarangay')
                                <span class="error">{{ $message }}</span>
                            @enderror


                        </div>
                    </div>


                </div>
                <input type="hidden" wire:model="user_type" name="user_type"
                    class="block w-full px-3 py-4 mt-1 bg-white border rounded-md shadow-sm border-slate-300 placeholder-slate-400 placeholder:text-gray-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm"
                    placeholder="User Type" />
                <div class="my-6">
                    <textarea type="text" wire:model="address" id="address" cols="30" rows="4" name="address"
                        class="w-full h-20 p-5 mb-10 text-gray-500 border rounded-md resize-none border-slate-300 placeholder-slate-400 placeholder:text-gray-500"
                        autocomplete="street-address" placeholder="Address">{{ $members->address }}</textarea>
                    @error('address')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>





                <div class="text-center ">
                    <button type="submit"
                        class="px-8 py-2 text-sm font-semibold text-white bg-blue-700 rounded-lg cursor-pointer">Update</button>
                </div>
            </div>
        </div>
    </form>
</div>
