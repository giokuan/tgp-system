<div>
    <h1>Member Details</h1>
    
    @if($member)
        <p><strong>Member ID:</strong> {{ $member->id }}</p>
        <p><strong>Name:</strong> {{ $member->first_name }} {{ $member->last_name }}</p>
        <p><strong>Email:</strong> {{ $member->email }}</p>
        <p><strong>Phone:</strong> {{ $member->phone }}</p>
        <!-- Add more member details as needed -->
    @else
        <p>Member not found.</p>
    @endif
</div>
