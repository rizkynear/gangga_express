<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Contact;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        Contact::where('read_status', '=', 0)->update(['read_status' => 1]);

        $contact = Contact::where('id', '!=', 0);

        if ($request->has('keyword') && !empty($request->keyword)) {
            $contact->where('name', 'LIKE', "%{$request->keyword}%")->orWhere('phone', 'LIKE', "%{$request->keyword}%")->orWhere('email', 'LIKE', "%{$request->keyword}%")->orWhere('message', 'LIKE', "%{$request->keyword}%");
        }

        $contacts = $contact->latest()->paginate(10);

        return view('admin.contact.index')->with(compact('contacts'));
    }

    public function delete(Contact $contact)
    {
        $contact->delete();

        return redirect()->back()->with('success', 'Data Successfully Deleted');
    }
}
