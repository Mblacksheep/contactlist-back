<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function create(Request $request)
    {
        if ($request->id) {
            $contact = Contact::find($request->id);
        } else {
            $contact = new Contact();
        }

        $contact = new Contact();
        $contact->contact_type_id = $request->type;
        $contact->contact_value = $request->value;
        $contact->person_id = $request->personId;
        $contact->save();

        return response(["contact" => $contact], 200);
    }

    public function byId(Request $request)
    {
        $contact = Contact::with('type')->find($request->id);

        return response(["contact" => $contact], 200);
    }

    public function byPerson(Request $request)
    {
        $contactList = Contact::with('type')->where("person_id", $request->personId)->get();

        return response(["contactList" => $contactList], 200);
    }

    public function all()
    {
        $contact = Contact::with('type')->orderBy('name', 'ASC')->get();

        return response(["contactList" => $contact], 200);
    }

    public function delete(Request $request)
    {
        $contact = Contact::find($request->id);
        $contact->delete();
    }
}
