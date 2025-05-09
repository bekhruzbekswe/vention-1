@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('contacts.create') }}" class="btn btn-primary mb-3">Add Contact</a>

    @if($contacts->count())
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th><th>Email</th><th>Phone</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contacts as $contact)
                    <tr  onclick="window.location='{{ route('contacts.show', $contact) }}'" style="cursor: pointer;" >
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td><a style="text-decoration:none;" href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a></td>
                        <td>
                            <a href="{{ route('contacts.edit', $contact) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('contacts.destroy', $contact) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Delete this contact?')" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No contacts found.</p>
    @endif
</div>
@endsection
