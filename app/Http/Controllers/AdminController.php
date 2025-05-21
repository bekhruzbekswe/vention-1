<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class AdminController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()->get(); 
        return view('admin.index', compact('contacts'));
    }

}
