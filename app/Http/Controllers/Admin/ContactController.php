<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use App\Http\Controllers\Controller;
use App\Mail\ReplyContact;
use App\User;
use Illuminate\Http\Request;
use Mail;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::orderBy('id', 'DESC')->paginate();

        return view('admin.contacts.index', compact('contacts'));
    }

    public function reply(User $user)
    {
        return view('admin.contacts.reply', compact('user'));
    }

    public function send(Request $request)
    {
        $content = $request->content;
        $user = User::find($request->user_id);

        if ($user) {
            $contact = [
                'name' => $user->lastname . " " . $user->firstname,
                'email' => $user->email,
                'content' => $content,
            ];

            Mail::to($contact['email'])->send(new ReplyContact($contact));
        }

        $contacts = Contact::orderBy('id', 'DESC')->paginate();

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
