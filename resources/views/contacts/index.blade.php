@extends('layouts.app')

@section('content')
<div class="contacts-container">
    <a href="{{ route('contacts.create') }}" class="contacts-container__add-button">Add Contact</a>

    @if($contacts->count())
        <table class="contacts-table">
            <thead class="contacts-table__head">
                <tr class="contacts-table__header-row">
                    <th class="contacts-table__header">Name</th>
                    <th class="contacts-table__header contacts__header--email">Email</th>
                    <th class="contacts-table__header">Phone</th>
                    <th class="contacts-table__header contacts__header--actions">Actions</th>
                </tr>
            </thead>
            <tbody class="contacts-table__body">
            @foreach($contacts as $contact)
                <tr
                    class="contacts-table__row contacts-table__row--clickable {{ $contact->is_blocked ? 'contacts-table__row--blocked' : '' }}"
                    onclick="window.location='{{ route('contacts.show', $contact) }}'">
                    
                    <td class="contacts-table__cell">{{ $contact->name }}</td>

                    <td class="contacts-table__cell contacts__cell--email">
                        {{ $contact->is_blocked ? '••••••••' : $contact->email }}
                    </td>

                    <td class="contacts-table__cell">
                        @if($contact->is_blocked)
                            <span class="contacts-table__phone">••••••••</span>
                        @else
                            <a href="tel:{{ $contact->phone }}" class="contacts-table__phone">{{ $contact->phone }}</a>
                        @endif
                    </td>

                    <td class="contacts-table__cell contacts__cell--actions">
    <div class="contacts-table__actions">
        @if($contact->is_blocked)
            <span class="contacts-table__blocked-label">Blocked</span>
        @else
            <a href="{{ route('contacts.edit', $contact) }}" class="contacts-table__action-button contacts-table__action-button--edit">
                Edit
            </a>

            <form action="{{ route('contacts.destroy', $contact) }}" method="POST" class="contacts-table__action-form">
                @csrf
                @method('DELETE')
                <button onclick="return confirm('Delete this contact?')" class="contacts-table__action-button contacts-table__action-button--delete">
                    Delete
                </button>
            </form>
        @endif
    </div>
</td>

                </tr>
            @endforeach

            </tbody>
        </table>
    @else
        <p class="contacts-container__empty-message">No contacts found.</p>
    @endif
</div>
@endsection
