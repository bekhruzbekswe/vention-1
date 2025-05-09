@extends('layouts.app')

@section('content')
<div class="container contact-container">
    <h1 class="contact-header">Edit Contact</h1>
    <form method="POST" action="{{ route('contacts.update', $contact) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-input" value="{{ $contact->name }}" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-input" value="{{ $contact->email }}">
        </div>
        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone" class="form-input" value="{{ $contact->phone }}">
        </div>
        <div class="mb-3">
            <label>Notes</label>
            <textarea name="notes" class="form-input">{{ $contact->notes }}</textarea>
        </div>
        <div class="buttons">
            <button class="save-button">Update</button>
            <a href="{{ route('contacts.index') }}" class="cancel-button">Cancel</a>
        </div>
    </form>
</div>
@endsection
