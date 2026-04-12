<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        return view('/inquiry');
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['name', 'email', 'tel', 'content']);
        return view('confirm', compact('contact'));
    }

    public function store(ContactRequest $request)
    {
        $contact = $request->only(['name', 'email', 'tel', 'content']);
        Contact::create($contact);
        return view('thanks');
    }
}
