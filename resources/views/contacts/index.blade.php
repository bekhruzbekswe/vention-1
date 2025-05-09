@extends('layouts.app')

@section('content')
<div class="contact-container">
    <a href="{{ route('contacts.create') }}" class="add-button">Add Contact</a>

    @if($contacts->count())
        <table class="contact-table">
            <thead>
                <tr>
                    <th>Name</th><th>Email</th><th>Phone</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contacts as $contact)
                    <tr onclick="window.location='{{ route('contacts.show', $contact) }}'" class="contact-row">
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td><a href="tel:{{ $contact->phone }}" class="contact-phone">{{ $contact->phone }}</a></td>
                        <td class="actions">
                            <a href="{{ route('contacts.edit', $contact) }}" class="edit-button">Edit</a>
                            <form action="{{ route('contacts.destroy', $contact) }}" method="POST" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Delete this contact?')" class="delete-button">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="no-contacts">No contacts found.</p>
    @endif
</div>
@endsection

