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
                    <tr class="contacts-table__row contacts-table__row--clickable" onclick="window.location='{{ route('contacts.show', $contact) }}'">
                        <td class="contacts-table__cell">{{ $contact->name }}</td>
                        <td class="contacts-table__cell contacts__cell--email">{{ $contact->email }}</td>
                        <td class="contacts-table__cell">
                            <a href="tel:{{ $contact->phone }}" class="contacts-table__phone">{{ $contact->phone }}</a>
                        </td>
                        <td class="contacts-table__cell contacts__cell--actions">
                            <div class="contacts-table__actions">
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
                                <!-- <form action="{{ route('contacts.toggleBlock', $contact) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-{{ $contact->is_blocked ? 'success' : 'warning' }}">
                                        {{ $contact->is_blocked ? 'Unblock' : 'Block' }}
                                    </button>
                                </form> -->
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
