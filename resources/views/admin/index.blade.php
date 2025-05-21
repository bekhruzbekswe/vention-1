@extends('layouts.app')

@section('content')
<div class="admin-container">
    <div class="admin-container__header">
        <h1 class="admin-container__title">Admin Dashboard</h1>
        <a href="{{ route('contacts.create') }}" class="admin-container__add-button">Add Contact</a>
    </div>

    @if($contacts->count())
        <!-- <div class="admin-actions">
            <div class="admin-actions__bulk">
                <button class="admin-actions__btn admin-actions__btn--delete" id="bulkDeleteBtn" disabled>Delete</button>
                <button class="admin-actions__btn admin-actions__btn--block" id="bulkBlockBtn" disabled>Block</button>
                <button class="admin-actions__btn admin-actions__btn--unblock" id="bulkUnblockBtn" disabled>Unblock</button>
            </div>
        </div> -->

        <table class="admin-table">
            <thead class="admin-table__head">
                <tr class="admin-table__header-row">
                    <!-- <th class="admin-table__header admin-table__header--selector">
                        <div class="admin-checkbox">
                            <input type="checkbox" id="selectAll" class="admin-checkbox__input">
                            <label for="selectAll" class="admin-checkbox__label"></label>
                        </div>
                    </th> -->
                    <th class="admin-table__header">Name</th>
                    <th class="admin-table__header">Email</th>
                    <th class="admin-table__header">Phone</th>
                    <th class="admin-table__header admin-table__header--status">Status</th>
                </tr>
            </thead>
            <tbody class="admin-table__body">
                @foreach($contacts as $contact)
                    <tr class="admin-table__row" data-id="{{ $contact->id }}">
                        <!-- <td class="admin-table__cell admin-table__cell--selector">
                            <div class="admin-checkbox">
                                <input type="checkbox" id="select-{{ $contact->id }}" class="admin-checkbox__input contact-selector">
                                <label for="select-{{ $contact->id }}" class="admin-checkbox__label"></label>
                            </div>
                        </td> -->
                        <td class="admin-table__cell">{{ $contact->name }}</td>
                        <td class="admin-table__cell">{{ $contact->email }}</td>
                        <td class="admin-table__cell">
                            <a href="tel:{{ $contact->phone }}" class="admin-table__phone">{{ $contact->phone }}</a>
                        </td>
                        <td class="admin-table__cell admin-table__cell--status">
                            <form action="{{ route('contacts.toggleBlock', $contact) }}" method="POST" class="admin-status__form">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="admin-status__button">
                                    @if($contact->is_blocked)
                                        <i class="admin-status__icon admin-status__icon--locked fa fa-lock"></i>
                                    @else
                                        <i class="admin-status__icon admin-status__icon--unlocked fa fa-unlock"></i>
                                    @endif
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <form id="bulkActionForm" method="POST" style="display: none;">
            @csrf
            <input type="hidden" name="_method" id="bulkMethod">
            <input type="hidden" name="ids" id="bulkIds">
        </form>
    @else
        <p class="admin-container__empty-message">No contacts found.</p>
    @endif
</div>
<script src="{{ asset('js/admin.js') }}" defer></script>
@endsection