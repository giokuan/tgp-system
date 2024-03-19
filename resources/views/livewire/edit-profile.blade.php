<div>
    {{-- <form wire:submit.prevent="updateProfile"> --}}
    {{-- <input type="text" wire:model="user.name" placeholder="Name">
        <input type="email" wire:model="user.email" placeholder="Email"> --}}
    {{-- <input type="id" wire:model="user" value="{{ $user->id }}"> --}}
    <!-- Add more fields as needed -->

    {{-- @foreach ($members as $member)
        <input type="text" name="members" value="{{ $member->id }}">
        <p>{{ $member->id }}</p>
        <p>{{ $member->last_name }}</p>
        <p>{{ $member->first_name }}</p>
        @if ($user)
            <p><img src="{{ asset('/storage/profile-photos/' . $user->profile_photo_path) }}"></p>
        @endif --}}



    {{-- <p><img src="{{ asset('public/profile-photos/' . $member->user->profile_photo_path) }}" alt="image"
                class="object-cover h-36 w-36"></p> --}}
    @foreach ($members as $member)
        <input type="text" name="members" value="{{ $member->id }}">
        <p>{{ $member->id }}</p>
        <p>{{ $member->last_name }}</p>
        <p>{{ $member->first_name }}</p>
        <p>{{ $member->user->name }}</p>
        {{-- <p>{{ $member->photo }}</p> --}}

        <div><img src="{{ asset('storage/' . $member->photo) }}" alt="image"
                class="object-cover rounded-full h-36 w-36"></div>
    @endforeach



    {{-- @if ($user)
        <p><img src="{{ asset('/storage/profile-photos/' . $user->profile_photo_path) }}"></p>
    @endif --}}
    {{-- <button type="submit">Save</button>
        </form> --}}
</div>
