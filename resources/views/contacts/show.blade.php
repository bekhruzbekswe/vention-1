@extends('layouts.app')

@section('title', 'View Contact')

@section('content')
<div class="container">
    <h1>Contact Details</h1>

    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title">{{ $contact->name }}</h5>
            <p class="card-text"><strong>Email:</strong> {{ $contact->email }}</p>
            <p class="card-text"><strong>Phone:</strong> {{ $contact->phone }}</p>
            <p class="card-text"><strong>Notes:</strong> {{ $contact->notes }}</p>
        </div>
    </div>

    <a href="{{ route('contacts.index') }}" class="btn btn-secondary mt-3">Back to List</a>
</div>
@endsection
