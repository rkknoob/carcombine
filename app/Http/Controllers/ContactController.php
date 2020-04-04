<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function index()
    {
        return view('page.contact.index')->withItems(Contact::GetDesc());
    }

    public function show(Contact $contact)
    {
        if($contact->read == 0):
            $contact->read = 1;
            $contact->save();
        endif;
        return view('page.contact.show')->withItem($contact);
    }

    public function store(Request $request)
    {
        Contact::create($request->all());
        return response()->json("success");
    }
}
