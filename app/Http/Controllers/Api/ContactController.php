<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $contacts = Contact::latest()->get();
        return response()->json([
            'status' => true,
            'message' => 'Contacts retrieved successfully',
            'data' => $contacts
        ]);
    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:contacts,name',
            'email' => 'nullable|email',
            'phone' => [
                'nullable', 
                'regex:/^\+?\d{10,20}$/',
            ],
            'notes' => 'nullable|string',
        ], [
            'phone.regex' => 'Invalid phone number',
        ]);
    
        $contact = auth()->user()->contacts()->create($validated);
    
        return response()->json([
            'status' => true,
            'message' => 'Contact created successfully',
            'data' => $contact
        ], 201);
    }    

    /**
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $contact = Contact::find($id);
        
        if (!$contact) {
            return response()->json([
                'status' => false,
                'message' => 'Contact not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data' => $contact
        ]);
    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $contact = Contact::find($id);
        
        if (!$contact) {
            return response()->json([
                'status' => false,
                'message' => 'Contact not found'
            ], 404);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone' => [
                'nullable', 
                'regex:/^\+?\d{10,20}$/',
            ],
            'notes' => 'nullable|string',
        ], [
            'phone.regex' => 'Invalid phone number',
        ]);

        $contact->update($validated);

        return response()->json([
            'status' => true,
            'message' => 'Contact updated successfully',
            'data' => $contact
        ]);
    }

    /**
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $contact = Contact::find($id);
        
        if (!$contact) {
            return response()->json([
                'status' => false,
                'message' => 'Contact not found'
            ], 404);
        }

        $contact->delete();

        return response()->json([
            'status' => true,
            'message' => 'Contact deleted successfully'
        ]);
    }
}