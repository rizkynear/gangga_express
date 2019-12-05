<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        Contact::where('read_status', '=', 0)->update(['read_status' => 1]);

        $contacts = Contact::all()->sortByDesc('id');

        return view('admin.contact.index')->with(compact('contacts'));
    }

    public function delete($id)
    {
        $record = Contact::findOrFail($id);

        $record->delete();

        return redirect()->back()->with('success', 'Data Successfully Deleted');
    }
}
