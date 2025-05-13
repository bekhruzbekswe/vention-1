@extends('layouts.app')

@section('title', 'View Contact')

@section('content')
<div class="contact-view">
    <h1 class="contact-view__title contact-view__name">{{ $contact->name }}</h1>

    <div class="contact-view__details">
        <p class="contact-view__item"><strong>Email:</strong> {{ $contact->email }}</p>
        <p class="contact-view__item"><strong>Phone:</strong> {{ $contact->phone }}</p>
        <p class="contact-view__item"><strong>Notes:</strong> {{ $contact->notes }}</p>
    </div>

    <div class="contact-view__actions">
        <a href="{{ route('contacts.index') }}" class="contact-view__button contact-view__button--home contacts-table__action-button">Home</a>
        <a href="{{ route('contacts.edit', $contact) }}" class="contact-view__button contact-view__button--edit contact-view__button--mobile contacts-table__action-button">Edit</a>
        
        <form action="{{ route('contacts.destroy', $contact) }}" method="POST" class="contact-view__form contact-view__form--delete contact-view__button--mobile ">
            @csrf
            @method('DELETE')
            <button onclick="return confirm('Delete this contact?')" class="contact-view__button contact-view__button--delete contacts-table__action-button">Delete</button>
        </form>
    </div>
</div>
@endsection
