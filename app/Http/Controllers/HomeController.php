<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class HomeController extends Controller
{

    public function index()
    {
        $contacts = Contact::orderBy('id', 'desc')->where('read', 0)->get();
        return view('home', [
            'contacts' => $contacts
        ]);
    }
    public function read($id){
        $contact = Contact::find($id);
        $contact->read = true;
        $contact->save();
        return redirect()->route('home');
    }
}
