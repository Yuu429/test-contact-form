<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function contact(Request $request)
    {
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'tel-1', 'tel-2', 'tel-3', 'address', 'building', 'content', 'detail']);
        return view('contact', compact('contact'));
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'tel-1', 'tel-2', 'tel-3', 'address', 'building', 'content', 'detail']);
        return view('confirm', compact('contact'));
    }

    public function store(Request $request)
    {
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'address', 'building', 'detail']);
        $contact['tel'] = $request->input('tel-1') . '-' . $request->input('tel-2') . '-' . $request->input('tel-3');
        $contact['category_id'] = $request->input('content');
        Contact::create($contact);
        return view('thanks');
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect()->route('admin.index');
    }
}
