<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactStore;
use App\Http\Models\Contact;

class ContactController extends Controller
{
    public function store(ContactStore $request)
    {
        Contact::create([
            'name'    => $request->name,
            'phone'   => $request->phone,
            'email'   => $request->email,
            'message' => $request->message
        ]);

        return response()->json(['success' => 'Successfully Added']);
    }
}
