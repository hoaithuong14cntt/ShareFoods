<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::paginate();

        return view('admin.contacts.index', compact('contacts'));
    }

    public function destroy($id)
    {
        $contact = Contact::find($id);

        if (!empty($contact)) {
            if ($contact->delete()) {
                return redirect()->route('admin.contacts.index');
            }
        } else {
            return 'co loi xay ra';
        }
    }
}
