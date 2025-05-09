@extends('layouts.app')

@section('title', 'View Contact')

@section('content')
<div class="container">
    <h1>Contact Details</h1>

    <div >
        <div class="card-body">
            <h5 class="form-input">{{ $contact->name }}</h5>
            <p class="form-input"><strong>Email:</strong> {{ $contact->email }}</p>
            <p class="form-input"><strong>Phone:</strong> {{ $contact->phone }}</p>
            <p class="form-input"><strong>Notes:</strong> {{ $contact->notes }}</p>
        </div>
    </div>
    <div class="buttons">
        <a href="{{ route('contacts.index') }}" class="cancel-button action-button">Home</a>
        <a href="{{ route('contacts.edit', $contact) }}" class="edit-button mobile-only action-button" id="show-edit">Edit</a>
        <form action="{{ route('contacts.destroy', $contact) }}" method="POST" id="show-delete" class="delete-form mobile-only">
            @csrf
            @method('DELETE')
            <button onclick="return confirm('Delete this contact?')" class="delete-button action-button">Delete</button>
        </form>
    </div>
</div>
@endsection
