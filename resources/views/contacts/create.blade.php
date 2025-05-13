@extends('layouts.app')

@section('content')
<div class="contact-form">
    <h1 class="contact-form__title">Add Contact</h1>
    <form method="POST" action="{{ route('contacts.store') }}" class="contact-form__form">
        @csrf
        
        <div class="contact-form__group">
            <label for="name" class="contact-form__label">Name</label>
            <input type="text" name="name" id="name" class="contact-form__input" required>
            @error('name')
                <div class="contact-form__error">{{ $message }}</div>
            @enderror
        </div>

        <div class="contact-form__group">
            <label for="email" class="contact-form__label">Email</label>
            <input type="email" name="email" id="email" class="contact-form__input">
            @error('email')
                <div class="contact-form__error">{{ $message }}</div>
            @enderror
        </div>

        <div class="contact-form__group">
            <label for="phone" class="contact-form__label">Phone</label>
            <input type="text" name="phone" id="phone" class="contact-form__input" value="{{ old('phone') }}">
            @error('phone')
                <div class="contact-form__error">{{ $message }}</div>
            @enderror
        </div>

        <div class="contact-form__group">
            <label for="notes" class="contact-form__label">Notes</label>
            <textarea name="notes" id="notes" class="contact-form__textarea">{{ old('notes') }}</textarea>
        </div>

        <div class="contact-form__actions">
            <button type="submit" class="contact-form__button contact-form__button--save">Save</button>
            <a href="{{ route('contacts.index') }}" class="contact-form__button contact-form__button--cancel">Cancel</a>
        </div>
    </form>
</div>
@endsection
