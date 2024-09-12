<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('contact.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'first_name' => 'required|string|max:255',
            'second_name' => 'required|string|max:255',
            'category' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required|integer',
        ]);

        $storagePath = 'public/images';

        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs($storagePath, $fileName);
            $photo = $fileName;
        }

        Contact::create([
            'first_name' => $request->first_name,
            'second_name' => $request->second_name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'category' => $request->category,
            'image' => $photo,
        ]);

        return redirect()->route('contacts.index')->with('message', 'Contact created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contact = Contact::findOrFail($id);
        return view('contact.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $contact = Contact::findOrFail($id);
        return view('contact.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the incoming data
        $data = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'first_name' => 'required|string|max:255',
            'second_name' => 'required|string|max:255',
            'category' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required|integer',
        ]);

        $storagePath = 'public/images';

        $contact = Contact::findOrFail($id);
        // Check if there is an incoming image
        if ($request->hasFile('image')) {
            // If the contact already has an image, delete the previous one
            if ($contact->image && Storage::exists($storagePath . '/' . $contact->image)) {
                Storage::delete($storagePath . '/' . $contact->image);
            }

            // Save the new image
            $fileName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs($storagePath, $fileName);

            // Set the new photo name to be saved in the database
            $data['image'] = $fileName;
        }

        // Update the contact with new data, including the image if uploaded
        $contact->update([
            'first_name' => $data['first_name'],
            'second_name' => $data['second_name'],
            'phone_number' => $data['phone_number'],
            'email' => $data['email'],
            'category' => $data['category'],
            'image' => $data['image'] ?? $contact->image,
        ]);

        // Redirect back with a success message
        return redirect()->route('contacts.index', $contact)->with('message', 'Contact updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $storagePath = 'public/images';

        $contact = Contact::findOrFail($id);

        if ($contact->image && Storage::exists($storagePath . '/' . $contact->image)) {
            Storage::delete($storagePath . '/' . $contact->image);
        }

        $contact->delete();

        return redirect()->route('contacts.index')->with('message', 'Contact deleted successfully');
    }
    
}
