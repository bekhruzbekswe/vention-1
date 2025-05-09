@extends('layouts.app')

@section('content')
<div class="contact-container">
        <h1 class="contact-header">Add Contact</h1>
        <form method="POST" action="{{ route('contacts.store') }}" >
            @csrf
            <div>
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-input" required>
                @error('name')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-input">
                @error('email')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" class="form-input" value="{{ old('phone') }}">
                @error('phone')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="notes">Notes</label>
                <textarea name="notes" id="notes" class="form-input">{{ old('notes') }}</textarea>
            </div>
            <div class="buttons">
                <button type="submit" class="save-button">Save</button>
                <a href="{{ route('contacts.index') }}" class="cancel-button">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
