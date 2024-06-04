<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        Contacts::create($request->all());

        return response()->json(['message' => 'Message sent successfully']);
    }

    public function index()
    {
        // Fetch all contacts from the database
        $contacts = Contacts::all();

        // Return the contacts data as JSON response
        return response()->json($contacts);
    }


    public function destroy($id)
    {
        $contact = Contacts::findOrFail($id); // Find the contact by its ID
        $contact->delete(); // Delete the contact
        return response()->json(['message' => 'Contact deleted successfully']);
    }


}