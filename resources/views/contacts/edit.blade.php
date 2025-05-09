@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Contact</h1>
    <form method="POST" action="{{ route('contacts.update', $contact) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ $contact->name }}" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $contact->email }}">
        </div>
        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ $contact->phone }}">
        </div>
        <div class="mb-3">
            <label>Notes</label>
            <textarea name="notes" class="form-control">{{ $contact->notes }}</textarea>
        </div>
        <button class="btn btn-primary">Update</button>
        <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
